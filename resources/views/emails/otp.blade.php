<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>PORTDA verification code</title>
</head>
<body style="margin:0;padding:0;background:#F4F4F5;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',sans-serif;color:#1F2937;">
  <table width="100%" cellpadding="0" cellspacing="0" style="background:#F4F4F5;padding:40px 16px;">
    <tr>
      <td align="center">
        <table width="100%" style="max-width:520px;background:#fff;border-radius:16px;overflow:hidden;box-shadow:0 8px 24px rgba(0,0,0,.06);">
          <tr>
            <td style="padding:28px 32px;background:linear-gradient(135deg,#000 0%,#8B5CF6 100%);color:#fff;">
              <div style="font-size:13px;letter-spacing:2px;opacity:.85;font-weight:600;">PORTDA</div>
              <div style="font-size:18px;font-weight:700;margin-top:6px;">Marine services marketplace</div>
            </td>
          </tr>
          <tr>
            <td style="padding:32px;">
              <p style="margin:0 0 12px;font-size:14px;color:#6B7280;">
                {{ match ($purpose) {
                    'register' => 'Welcome to PORTDA. Use this code to verify your account:',
                    'reset'    => 'Use this code to reset your PORTDA password:',
                    'verify'   => 'Use this code to confirm your email address:',
                    default    => 'Use this code to sign in to PORTDA:',
                } }}
              </p>
              <div style="margin:24px 0;padding:20px;background:#F5F3FF;border-radius:14px;text-align:center;">
                <div style="font-size:36px;font-weight:900;letter-spacing:14px;color:#8B5CF6;font-family:'SF Mono',Menlo,monospace;">
                  {{ $code }}
                </div>
              </div>
              <p style="margin:0;font-size:13px;color:#6B7280;line-height:1.6;">
                This code expires in <strong>10 minutes</strong>. If you didn't request it, you can safely ignore this email.
              </p>
              <p style="margin:24px 0 0;font-size:12px;color:#9CA3AF;">— The PORTDA team</p>
            </td>
          </tr>
        </table>
        <div style="margin-top:18px;font-size:11px;color:#9CA3AF;">PORTDA &middot; Mumbai, India</div>
      </td>
    </tr>
  </table>
</body>
</html>
