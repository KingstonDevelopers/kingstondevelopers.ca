<?php

namespace App\Http\Controllers;

use App\Contracts\SlackApiContract;
use App\Service\SlackApiContractClient;
use Carbon\Carbon;
use Illuminate\Cache\CacheManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SlackController extends Controller
{
    private SlackApiContract $slack;
    private CacheManager $cache;

    public function __construct(SlackApiContract $slack, CacheManager $cache)
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

        $title = config('slack.badge.title');
        $value = $this->slack->getMemberCount();
        $left = (strlen($title) * 6) + 16;
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
