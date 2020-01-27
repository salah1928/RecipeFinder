<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use App\Mail\Welcome;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/recipes';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        if($data['city'] == null){$data['city'] = 'unspecified';};
        if($data['birthday'] == null){$data['birthday'] = 'unspecified';};
        if($data['gender'] == null){$data['gender'] = 'unspecified';};
      
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'image' => ['nullable' , 'string'],
            'city' => ['nullable' , 'string' , 'max:255'],
            'birthday' => ['nullable' , 'string'],
            'bio' => ['nullable' , 'string','max:255'],
            'gender' => ['nullable' , 'string' , 'max:255'],

            
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $fileNameToStore='noimage.jpg';

        if($data['city'] == null){$data['city'] = 'unspecified';};
        if($data['birthday'] == null){$data['birthday'] = 'unspecified';};
        if($data['gender'] == null){$data['gender'] = 'unspecified';};
        

        if($data['image'] !== null){
            $img64 = explode(',',$data['image']);
          
            
            $img = base64_decode($img64[1]);

            $fileNameToStore = time().'_'.$data['imgname'];

            $path = public_path().'\user_images\\'.$fileNameToStore;

            file_put_contents($path,$img);

        }

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'image'=>$fileNameToStore,
            'city'=>$data['city'],
            'birthday'=>$data['birthday'],
            'bio'=>$data['bio'],
            'gender'=>$data['gender'],
           
        ]);
            \Mail::to($user)->send(new Welcome($user));
        return $user ;

        
    }
}
