<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Your Password</title>
</head>
<body style="margin: 0; padding: 0; width: 100% !important; background-color: #f4f5f7; font-family: 'Open Sans', 'Helvetica Neue', Helvetica, Arial, sans-serif; -webkit-font-smoothing: antialiased;">

    <table border="0" cellpadding="0" cellspacing="0" width="100%" bgcolor="#f4f5f7" style="table-layout: fixed;">
        <tr>
            <td align="center" style="padding: 40px 10px 40px 10px;">
                
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px; border-collapse: collapse; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 12px rgba(0,0,0,0.05);">
                    
                    <tr>
                        <td align="center" bgcolor="#5e72e4" style="padding: 40px 20px 40px 20px;">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td align="center" valign="middle">
                                        <span style="color: #ffffff; font-size: 24px; font-weight: 600; letter-spacing: 0.5px; font-family: sans-serif;">
                                            Argon Dashboard 2
                                        </span>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td bgcolor="#ffffff" align="left" style="padding: 40px 30px 40px 30px;">
                            
                            <h2 style="margin: 0; color: #32325d; font-size: 22px; font-weight: 600; line-height: 32px; margin-bottom: 20px; font-family: sans-serif;">
                                Reset Password Request
                            </h2>
                            
                            <p style="margin: 0; color: #525f7f; font-size: 16px; line-height: 26px; margin-bottom: 20px; font-family: sans-serif;">
                                Hello, {{ $name }}
                            </p>
                            
                            <p style="margin: 0; color: #525f7f; font-size: 16px; line-height: 26px; margin-bottom: 30px; font-family: sans-serif;">
                                We received a request to reset the password for your account. No changes have been made yet. You can reset your password by clicking the secure button below:
                            </p>

                            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin-bottom: 30px;">
                                <tr>
                                    <td align="center">
                                        <a href="{{ url('admin/reset_password?' . $token . '&mail=' . $mail) }}" target="_blank" style="background-color: #5e72e4; color: #ffffff; display: inline-block; font-size: 14px; font-weight: 600; line-height: 48px; text-align: center; text-decoration: none; width: 220px; border-radius: 4px; text-transform: uppercase; letter-spacing: 1px; font-family: sans-serif;">
                                            Reset Password
                                        </a>
                                    </td>
                                </tr>
                            </table>

                            <p style="margin: 0; color: #8898aa; font-size: 14px; line-height: 24px; font-family: sans-serif;">
                                If you did not request a password reset, you can safely ignore this email. This link will expire in 60 minutes.
                            </p>

                        </td>
                    </tr>
                </table>

                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px; margin-top: 20px;">
                    <tr>
                        <td align="center" style="color: #8898aa; font-size: 12px; line-height: 22px; font-family: sans-serif; padding: 0 20px;">
                            <p style="margin: 0 0 5px 0;">&copy; {{ date('Y') }} Argon Dashboard 2. All rights reserved.</p>
                            <p style="margin: 0;">Our headquarters: 123 Dashboard Ave, Suite 500</p>
                        </td>
                    </tr>
                </table>

            </td>
        </tr>
    </table>

</body>
</html>