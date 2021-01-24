<?php

namespace App\Service;

use Illuminate\Notifications\Messages\SlackAttachment;
use Illuminate\Notifications\Messages\SlackMessage;
use Illuminate\Notifications\Messages\SlackAttachmentField;
use GuzzleHttp\Client as HttpClient;

class Slack
{
    
    private $http;
    private $url;
    
    public function __construct()
    {
        $this->http = new HttpClient; // TODO: Needs to use DI for this instead.
        $this->url  = config('slack.webhook_url'); // Same here.
    }
    
    public function sendMessage(SlackMessage $message)
    {
        $this->http->post($this->url, $this->buildJsonPayload(
            $message
        ));
    }
    
    //
    // Below is snipped from SlackWebhookChannel.php from Laravel's notifications.
    // TODO: Not sure if we can actually use laravel notifications for these notifications.
    // Will investigate later. Until now this keeps things cleaner
    //
    
    /**
     * Build up a JSON payload for the Slack webhook.
     *
     * @param  \Illuminate\Notifications\Messages\SlackMessage $message
     *
     * @return array
     */
    protected function buildJsonPayload(SlackMessage $message)
    {
        $optionalFields = array_filter([
                                           'channel'    => data_get($message, 'channel'),
                                           'icon_emoji' => data_get($message, 'icon'),
                                           'icon_url'   => data_get($message, 'image'),
                                           'link_names' => data_get($message, 'linkNames'),
                                           'username'   => data_get($message, 'username'),
                                       ]);
        
        return array_merge([
                               'json' => array_merge([
                                                         'text'        => $message->content,
                                                         'attachments' => $this->attachments($message),
                                                     ], $optionalFields),
                           ], $message->http);
    }
    
    /**
     * Format the message's attachments.
     *
     * @param  \Illuminate\Notifications\Messages\SlackMessage $message
     *
     * @return array
     */
    protected function attachments(SlackMessage $message)
    {
        return collect($message->attachments)->map(function ($attachment) use ($message) {
            return array_filter([
                                    'color'       => $attachment->color ?: $message->color(),
                                    'fallback'    => $attachment->fallback,
                                    'fields'      => $this->fields($attachment),
                                    'footer'      => $attachment->footer,
                                    'footer_icon' => $attachment->footerIcon,
                                    'image_url'   => $attachment->imageUrl,
                                    'mrkdwn_in'   => $attachment->markdown,
                                    'text'        => $attachment->content,
                                    'title'       => $attachment->title,
                                    'title_link'  => $attachment->url,
                                    'ts'          => $attachment->timestamp,
                                ]);
        })->all();
    }
    
    /**
     * Format the attachment's fields.
     *
     * @param  \Illuminate\Notifications\Messages\SlackAttachment $attachment
     *
     * @return array
     */
    protected function fields(SlackAttachment $attachment)
    {
        return collect($attachment->fields)->map(function ($value, $key) {
            if ($value instanceof SlackAttachmentField)
            {
                return $value->toArray();
            }
            
            return ['title' => $key, 'value' => $value, 'short' => true];
        })->values()->all();
    }
}