<?php

namespace App\Models;

use App\Mail\SendCodeMail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session as FacadesSession;
use Symfony\Component\HttpFoundation\Session\Session;

use function Laravel\Prompts\info;

class User extends Model
{
    protected $fillable = ['name', 'email', 'password', 'role'];
    protected $hidden = ['password'];

    public function favorites(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }

    public function generateCode($id)
    {
        $code = rand(100000, 999999);

        UserCode::updateOrCreate(
            ['user_id' => $id],
            ['code' => $code]
        );
        try {
            $detailes = [
                'title' => 'voici le lien de confirmation it will exoire in 2 min make sure to verify before the expiration',
                'code' => $code
            ];
            $user = User::find($id);
            Mail::to($user->email)->send(new SendCodeMail($detailes, $user->email));
        } catch (\Exception  $e) {
            info('Eroor: ' . $e->getMessage());
            dd($e);
        }
    }
}
