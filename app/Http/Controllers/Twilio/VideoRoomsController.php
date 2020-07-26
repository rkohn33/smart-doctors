<?php

namespace App\Http\Controllers\Twilio;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

use Twilio\Rest\Client;
use Twilio\Jwt\AccessToken;
use Twilio\Jwt\Grants\VideoGrant;

class VideoRoomsController extends Controller
{
    public function __construct()
    {
        $this->sid = config('services.twilio.sid');
        $this->token = config('services.twilio.token');
        $this->key = config('services.twilio.key');
        $this->secret = config('services.twilio.secret');
    }

    public function index($data)
    {
        $rooms = [];
        try {
            $client = new Client($this->sid, $this->token);
            $allRooms = $client->video->rooms->read($data);
                $rooms = array_map(function($room) {
                return $room->uniqueName;
                }, $allRooms);

        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
        return $rooms;
        return view('twilio.video', ['rooms' => $rooms]);
    }

    public function createRoom($roomName)
    {
        $client = new Client($this->sid, $this->token);

        $exists = $client->video->rooms->read([ 'uniqueName' => $roomName]);

        if (empty($exists)) {
            $client->video->rooms->create([
                'uniqueName' => $roomName,
                'type' => 'group',
                'recordParticipantsOnConnect' => false
            ]);

            // \Log::debug("created new room: ".$request->roomName);
        }
        return $roomName;

    }

    public function joinRoom($roomName)
    {

        // A unique identifier for this user
        $identity = Auth::user()->firstname;

        \Log::debug("joined with identity: $identity");
        $token = new AccessToken($this->sid, $this->key, $this->secret, 3600, $identity);

        $videoGrant = new VideoGrant();
        $videoGrant->setRoom($roomName);

        $token->addGrant($videoGrant);

        return [ 'accessToken' => $token->toJWT(), 'roomName' => $roomName ];
        // view('twilio.room', [ 'accessToken' => $token->toJWT(), 'roomName' => $roomName ]);
    }


}
