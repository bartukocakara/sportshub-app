<?php

namespace App\Http\Requests\Request;

use App\Http\Requests\BaseFormRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class RequestPrivateChatRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $validator = $this->validateDatabase();

        return $validator->errors()->all() ? $this->failedValidation($validator) : [
            'receiver_user_id' => 'required|uuid|exists:users,id',
            'title' => 'required|max:255'
        ];
    }

    private function validateDatabase()
    {
        $validator = Validator::make([], []);

        $existingChatUser = DB::table('private_chat_users')
                                ->whereIn('user1_id', [$this->input('receiver_user_id'), auth()->user()->id])
                                ->whereIn('user2_id' , [$this->input('receiver_user_id'), auth()->user()->id])
                                ->first();

        if ($existingChatUser) {
            $validator->errors()->add('user1_id', 'The combination of user1_id and user2_id already exists.');
        }

        $existingRequestPrivateChat = DB::table('request_private_chats')
                                        ->whereIn('receiver_user_id', [$this->input('receiver_user_id'), auth()->user()->id])
                                        ->whereIn('requested_user_id' , [$this->input('receiver_user_id'), auth()->user()->id])
                                        ->first();
        if ($existingRequestPrivateChat) {
            $validator->errors()->add('receiver_user_id', 'A request between these users already exists.');
        }

        return $validator;
    }
}
