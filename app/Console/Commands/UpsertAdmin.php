<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class UpsertAdmin extends Command
{
    protected $signature = 'portda:upsert-admin
                            {--email= : Admin email (defaults to env ADMIN_EMAIL)}
                            {--password= : Admin password (defaults to env ADMIN_PASSWORD)}
                            {--name=PORTDA Admin : Display name}';

    protected $description = 'Create or update the PORTDA admin user. Reads credentials from --options or env (ADMIN_EMAIL, ADMIN_PASSWORD).';

    public function handle(): int
    {
        $email    = $this->option('email')    ?: env('ADMIN_EMAIL');
        $password = $this->option('password') ?: env('ADMIN_PASSWORD');
        $name     = $this->option('name');

        if (! $email || ! $password) {
            $this->error('Missing credentials.');
            $this->line('Provide them via --email and --password, or set ADMIN_EMAIL + ADMIN_PASSWORD in .env');
            return self::FAILURE;
        }
        if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->error("Invalid email: {$email}");
            return self::FAILURE;
        }
        if (strlen($password) < 8) {
            $this->error('Password must be at least 8 characters.');
            return self::FAILURE;
        }

        $existing = User::withTrashed()->where('email', $email)->first();
        $isNew    = $existing === null;

        $user = $existing ?? new User();
        $user->fill([
            'name'     => $name,
            'email'    => $email,
            'password' => $password,        // User model has `'password' => 'hashed'` cast → bcrypt
            'role'     => 'admin',
            'status'   => 'active',
        ]);
        if ($existing && $existing->trashed()) {
            $user->restore();
        }
        $user->save();

        $masked = str_repeat('•', max(0, strlen($password) - 2)) . substr($password, -2);
        $this->info(($isNew ? 'Created' : 'Updated') . " admin #{$user->id}: {$user->email}");
        $this->line("  name:     {$user->name}");
        $this->line("  role:     admin");
        $this->line("  status:   active");
        $this->line("  password: {$masked}   (length " . strlen($password) . ')');
        $this->newLine();
        $this->comment('SECURITY: clear your shell history after this command.');
        $this->comment('  bash:  history -c');
        $this->comment('  zsh:   > ~/.zsh_history');

        return self::SUCCESS;
    }
}
