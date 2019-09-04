<?php

namespace Formstatic\Processors;

use PHPMailer\PHPMailer\PHPMailer;

class EmailProcessor extends Processor
{
    /**
     * @return array
     */
    protected function validationRules()
    {
        return [
            'to'       => 'required|valid_email',
            'cc'       => 'valid_email',
            'bcc'      => 'valid_email',
            'reply_to' => 'valid_email',
        ];
    }

    /**
     * @param array $data
     * @param array $options
     * @return string|null
     */
    protected function process($data, $options)
    {
        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->Host       = env('EMAIL_HOST');
        $mail->Username   = env('EMAIL_USERNAME');
        $mail->Password   = env('EMAIL_PASSWORD');
        $mail->Port       = env('EMAIL_PORT');
        $mail->SMTPAuth   = env('EMAIL_SMTPAUTH', true);
        $mail->SMTPSecure = env('EMAIL_SMTPSECURE', 'tls');

        $mail->setFrom(env('MAIL_FROM_EMAIL'), env('MAIL_FROM_NAME', appName()));
        $mail->addAddress($options['to']);

        if (!empty($options['reply_to'])) {
            $mail->addReplyTo($options['reply_to']);
        }
        if (!empty($options['cc'])) {
            $mail->addCC($options['cc']);
        }
        if (!empty($options['bcc'])) {
            $mail->addBCC($options['bcc']);
        }

        $subject = env('MAIL_SUBJECT', appName() . ' Submission');
        if (!empty($options['subject'])) {
            $subject = $options['subject'];
        }

        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = nl2br($this->dataToString($data));
        $mail->AltBody = $this->dataToString($data);

        $mail->send();
    }
}
