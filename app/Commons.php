<?php

namespace App;

use App\Models\CourseLanguage;
use App\Models\LogSendMail;
use App\Models\MessageNotify;
use App\Models\Setting;
use App\Models\TemplateMail;
use App\Models\VideoLanguage;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Mailgun\Mailgun;

class Commons
{
    public static function validateDate($date, $format = 'Y-m-d H:i:s')
    {
        $d = \DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) == $date;
    }

    public static function renameFile($fileName)
    {
        if (empty($fileName)) {
            return '';
        }
        $extension = pathinfo($fileName, PATHINFO_EXTENSION);
        $filename = pathinfo($fileName, PATHINFO_FILENAME);
        return $filename . "_" . time() . '.' . $extension; //
    }

    public static function truncate($text, $length = 50)
    {

        if (strlen($text) > $length) {
            $text = $text . " ";
            $text = substr($text, 0, $length);
            $text = $text . "...";
        }
        return $text;
    }

    /**
     *
     * @param mixed $fromEmail
     * @param mixed $fromName
     * @param mixed $to
     * @param mixed $subject
     * @param mixed $template
     * @param mixed $data
     */
    // public static function sendMail($fromEmail,$fromName, $to, $subject, $template, $domain = 'members.vivanow.us')
    // {
    //     if (empty($to)) {
    //         return false;
    //     }
    //     try {
    //         $mailGun = Mailgun::create(env('MAILGUN_PRIVATE_API_KEY'));
    //         if (empty($from)) {
    //             $fromEmail = env('MAIL_FROM_ADDRESS');
    //         }
    //         if (empty($fromName)) {
    //             $fromName = env('MAIL_FROM_NAME');
    //         }
    //         $from = $fromName . '<' . $fromEmail . '>';

    //         $mailGun->messages()->send($domain, [
    //             'from' => $from,
    //             'to' => $to,
    //             'subject' => $subject,
    //             'html' =>'<html>'.$template.'</html>',
    //         ]);
    //         return true;
    //     } catch (\Exception $e) {

    //     }
    // }

    // public static function getTemplate($key = '', $data = [], $lang = 'vi') {
    //     if ($key == ''){
    //         return false;
    //     }
    //     $header_text = '';
    //     $footer_text = '';
    //     $body_text = '';
    //     $subject_text = '';

    //     $header = Setting::where('key','template-mail-header')->first();
    //     $footer = Setting::where('key','template-mail-footer')->first();
    //     $templateMail = TemplateMail::where('key', $key)->first();
    //     if ($lang === config('constants.LANG_CODE_EN')){
    //         $templateMail->template_body = !empty($templateMail->template_body_en) ? $templateMail->template_body_en : $templateMail->template_body;
    //         $templateMail->template_subject = !empty($templateMail->template_subject_en) ? $templateMail->template_subject_en : $templateMail->template_subject;
    //     }

    //     if ($header){
    //         $header_text =  $header->source;
    //         if ($lang === config('constants.LANG_CODE_EN')){
    //             $header_text =  $header->source_en;
    //         }
    //     }
    //     if ($footer){
    //         $footer_text =  $footer->source;
    //         if ($lang === config('constants.LANG_CODE_EN')){
    //             $footer_text =  $footer->source_en;
    //         }
    //     }
    //     if ($templateMail){
    //         $body_text =  $templateMail->template_body;
    //         $subject_text = $templateMail->template_subject;
    //     }

    //     $header_text = strtr($header_text,$data);
    //     $body_text = strtr($body_text,$data);
    //     $footer_text = strtr($footer_text,$data);
    //     $subject_text = strtr($subject_text,$data);
    //     return [
    //         'subject' => $subject_text,
    //         'body' => $header_text.$body_text.$footer_text,
    //     ];

    // }

    public static function slug($title, $separator = '-', $language = 'en')
    {
        $title = $language ? Str::ascii($title, $language) : $title;

        // Convert all dashes/underscores into separator
        $flip = $separator === '-' ? '_' : '-';

        $title = preg_replace('!['.preg_quote($flip).']+!u', $separator, $title);

        // Replace @ with the word 'at'
        $title = str_replace('@', $separator.'at'.$separator, $title);

        // Remove all characters that are not the separator, letters, numbers, or whitespace.
        $title = preg_replace('![^'.preg_quote($separator).'\pL\pN\s]+!u', '', $title);

        // Replace all separator characters and whitespace by a single separator
        $title = preg_replace('!['.preg_quote($separator).'\s]+!u', $separator, $title);

        return trim($title, $separator);
    }

    // public static function utilMessaging($data, $type = [] ) {
    //     try {
    //         $msg = MessageNotify::create([
    //             'customer_id' => $data['user_id'],
    //             'notification_id' => $data['notification_id'],
    //             'title' => $data['title'],
    //             'title_en' => $data['title_en'],
    //             'content' => $data['content'],
    //             'content_en' => $data['content_en'],
    //             'short_description' => $data['short_description'],
    //             'short_description_en' => $data['short_description_en'],
    //             'url' => isset($data['url']) ? $data['url'] : '',
    //             'type' => $data['type'],
    //             'status' => config('constants.MESSAGE_NOTIFY_STATUS_TEXT.Unread')
    //         ]);
    //         if( in_array(config('constants.NOTIFICATION_SEND_TYPE_KEY.email'),$type)){
    //             // send mail
    //             $header_text = '';
    //             $footer_text = '';
    //             $header = Setting::where('key','template-mail-header')->first();
    //             $footer = Setting::where('key','template-mail-footer')->first();
    //             if ($header){
    //                 $header_text =  $header->source;
    //             }
    //             if ($footer){
    //                 $footer_text =  $footer->source;
    //             }
    //             if (isset($data['email']) && !empty($data['email'])){
    //                 $title_mail = $data['title'];
    //                 $body_mail = $data['content'];
    //                 if( $data['lang_code'] == config('constants.LANG_CODE_EN')){
    //                     $title_mail = $data['title_en'];
    //                     if( !empty($data['content_en'])){
    //                         $body_mail = $data['content_en'];
    //                     }
    //                 }
    //                 Commons::sendMail(
    //                     config('constants.FROM_FLS_MAIL'),
    //                     config('constants.FROM_FLS_NAME'),
    //                     $data['email'],
    //                     $title_mail,
    //                     $header_text.$body_mail.$footer_text,
    //                 );
    //                 Commons::saveLogSendMail($data['user_id'],$data['email'], $title_mail,$data['notification_id']);
    //             }

    //         }
    //         if( in_array(config('constants.NOTIFICATION_SEND_TYPE_KEY.message'),$type)){
    //             if( !empty($data['firebase_token'])){
                    
    //                 $data['body'] = $data['short_description'];
    //                 $data['msg_id'] = $msg->id;
    //                 if( $data['lang_code'] == config('constants.LANG_CODE_EN')){
    //                     $data['title'] = $data['title_en'];
    //                     if( !empty($data['short_description_en'])){
    //                         $data['body'] = $data['short_description_en'];
    //                     } 
    //                 }
    //                 unset($data['content']);
    //                 unset($data['content_en']);
    //                 unset($data['short_description']);
    //                 unset($data['short_description_en']);
    //                 unset($data['title_en']);
    //                 self::pushNotification($data['firebase_token'], $data);
    //             }
    //         }
    //     } catch (\Exception $exception) {
    //         return $exception->getMessage();
    //     }
    // }

    public static function pushNotification($to, $data){
        $url = 'https://fcm.googleapis.com/fcm/send ';
        $serverKey = config('constants.FIREBASE_SERVER_KEY');
        $msg = [
            'data' => $data,
            'notification' => $data
        ];
        $fields = array();
        $fields['data'] = $msg;
        if (is_array($to)) {
            $fields['registration_ids'] = $to;
        } else {
            $fields['to'] = $to;
        }
        $headers = array(
            'Content-Type:application/json',
            'Authorization:key=' . $serverKey
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);
        if ($result === FALSE) {
            return $result;
            print_r('FCM Send Error: '  .  curl_error($ch));
        }
        curl_close($ch);
        return $result;
    }

    /**
     * @param $time
     * @param string $format
     * @param $timezone_to
     * @param string $timezone_from
     * @return Carbon|false
     */
    public static function convertTimeUTC($time,$format = 'Y-m-d H:i:00',$timezone_to,$timezone_from = 'UTC') {
        if (empty($format)){
            $format = 'Y-m-d H:i:00';
        }
        $time = Carbon::parse($time)->format($format);
        return Carbon::createFromFormat($format, $time, $timezone_from)->setTimezone($timezone_to);
    }

    // public static function saveLogSendMail($user_id,$mail_to,$subject,$notification_id) {
    //     LogSendMail::create(array(
    //         'customer_id' => $user_id,
    //         'mail_to' => $mail_to,
    //         'subject' => $subject,
    //         'notification_id' => $notification_id,
    //     ));
    // }

    // public static function getTranslateCourse($courseObj, $language ){
    //     $courseLanguage = CourseLanguage::where('course_id', $courseObj->id)->where('lang_code', $language)->first();
    //     if( !empty($courseLanguage)){
    //         $courseObj->name = !empty($courseLanguage->name) ? $courseLanguage->name : $courseObj->name;
    //         $courseObj->description = !empty($courseLanguage->description) ? $courseLanguage->description : $courseObj->description;
    //         $courseObj->introduce = !empty($courseLanguage->introduce) ? $courseLanguage->introduce : $courseObj->introduce;
    //         $courseObj->url_image = !empty($courseLanguage->url_image) ? $courseLanguage->url_image : $courseObj->url_image;
    //         $courseObj->url_banner = !empty($courseLanguage->url_banner) ? $courseLanguage->url_banner : $courseObj->url_banner;
    //     }
    //     return $courseObj;
    // }

    // public static function getTranslateVideo($videoObj, $language){
    //     $videoLanguage = VideoLanguage::where('video_id', $videoObj->id)->where('lang_code', $language)->first();
    //     if( !empty($videoLanguage)){
    //         $videoObj->name = !empty($videoLanguage->name) ? $videoLanguage->name : $videoObj->name;
    //         $videoObj->description = !empty($videoLanguage->description) ? $videoLanguage->description : $videoObj->description;
    //         $videoObj->duration = !empty($videoLanguage->duration) ? $videoLanguage->duration : $videoObj->duration;
    //         $videoObj->time_unlock = !empty($videoLanguage->time_unlock) ? $videoLanguage->time_unlock : $videoObj->time_unlock;
    //         $videoObj->url = !empty($videoLanguage->url) ? $videoLanguage->url : $videoObj->url;
    //         $videoObj->thumbnail = !empty($videoLanguage->thumbnail) ? $videoLanguage->thumbnail : $videoObj->thumbnail;
    //         $videoObj->link = !empty($videoLanguage->link) ? $videoLanguage->link : $videoObj->link;
    //         $videoObj->method = isset($videoLanguage->method) ? $videoLanguage->method : $videoObj->method;
    //     }
    //     return $videoObj;
    // }
    public static function getTranslateMembership($membership, $language){
        if( !empty($membership) && $language == config('constants.LANG_CODE_EN')){
            $membership->title = !empty($membership->title_en) ? $membership->title_en : $membership->title;
            $membership->description = !empty($membership->description_en) ? $membership->description_en : $membership->description;
            $membership->url_image = !empty($membership->url_image_en) ? $membership->url_image_en : $membership->url_image;
        }
        return $membership;
    }
}
