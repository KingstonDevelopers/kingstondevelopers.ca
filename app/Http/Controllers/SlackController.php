<?php

namespace App\Http\Controllers;

use App\Service\Slack;
use Carbon\Carbon;
use Illuminate\Cache\CacheManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SlackController extends Controller
{
    private Slack $slack;
    private CacheManager $cache;

    public function __construct(Slack $slack, CacheManager $cache)
    {
        $this->slack = $slack;
        $this->cache = $cache;
    }

    public function showInvite(Request $request)
    {
        return view(
            'slack.invite',
            [
                'logo' => $this->slack->getTeamLogo(),
                'members' => $this->slack->getMemberCount(),
            ]
        );
    }

    public function requestInvite(Request $request)
    {
        $validated = $request->validate(
            [
                'email' => 'required|email',
            ]
        );

        $inviteResponse = $this->slack->invite($validated['email']);

        return view(
            'slack.invite-sent',
            [
                'email' => $validated['email'],
                'logo' => $this->slack->getTeamLogo(),
                'members' => $this->slack->getMemberCount(),
                'response' => $inviteResponse,
            ]
        );
    }

    public function badge()
    {
        abort_unless(config('slack.badge.enabled'), 404);

        $members = $this->cache->remember(
            'members',
            60,
            function () {
                return $this->slack->getMemberCount();
            }
        );

        $title = config('slack.badge.title');

        $left = (strlen($title) * 6) + 16;
        if (config('slack.presence')) {
            $value = $members['online'] . '/' . $members['total'];
        } else {
            $value = $members['total'];
        }
        $width = $left + (strlen($value) * 6) + 10;


        return response()
            ->view(
                'slack.badge',
                [
                    'title' => $title,
                    'color' => config('slack.badge.color'),
                    'value' => $value,
                    'width' => $width,
                    'left' => $left,
                ]
            )
            ->header('Content-Type', 'image/svg+xml');
    }
}
