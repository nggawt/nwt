<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;

use App\User;

use Illuminate\Support\Facades\Auth;

class Users_controller extends Controller
{
    public function __construct() {
        $this->middleware('auth',['only' => ['update','edit','getLogout','index']]);
        $this->middleware('guest', ['only' => 'create','getLogin']);
        
    }
    
    public function index(){
        
        $users = User::all();
        //dd($users);
        return view('dashboard.users.list',['users' => $users]);
    }
    
    public function create(){
        //create user page
        return view(' users.user-create');
    }
    
    public function update($usrId){
        
        //update user
        
        return redirect()->back();;
    }
    
    public function edit($usrId){
        //edit user pafe
        return view('users.edit');
    }
    
    public function getLogin(Request $req){
        
        $validator = Validator::make($req->all(),[
            'email' => 'required|email',
            'password' => 'required|min:5'
        ],[
            'email.required' => 'מלא את שדה האימייל.',
            'email.email' => 'יש למלא שדה  לפי פורמט המתאים לאימייל',
            'password.required' => 'מלא את שדה הסיסמה',
            'password.min'  => 'יש למלא סיסמה בת 6 ספרות לפחות.'
        ]);
         if ($validator->fails()) {
            return redirect()
                        ->back()
                        ->withErrors($validator,'logInErrors')
                        ->withInput();
        }
        
        if(!Auth::attempt(['email' => $req['email'],'password' => $req['password']])){
            return redirect()->back()->with(['fail' => 'התחברות לאתר נכשלה']);
        }
        return redirect()->back();//->with(['massege' => 'אתה מחובר כעת']);
    }
    
     public function getLogout(){
        Auth::logout();
        return redirect()->route('home');
    }
    
    public function store(Request $req){
        //
        
         $validator = Validator::make($req->all(),[
            'firstName' => 'required|alpha|min:2|max:255',
            'lastName' => 'required|alpha|min:2|max:255',
            'email' => 'required|email',
            'password' => 'required|min:5',
            'passwordConfirm' => 'required|same:password'
        ],[
            'firstName.required' => 'מלא את שדה השם שלך',
            'firstName.min' => 'שם שלך חייב להיות בעל שתי אותיות לפחות',
            'lastName.required' => 'מלא את שדה שם משפחה שלך',
            'lastName.min' => 'שם המשפחה שלך חייב להיות בעל שתי אותיות לפחות',
            'email.required' => 'מלא את שדה האימייל.',
            'email.email' => 'יש למלא שדה  לפי פורמט המתאים לאימייל',
            'password.required' => 'מלא את שדה הסיסמה',
            'password.min'  => 'יש למלא סיסמה בת 6 ספרות לפחות.',
            'passwordConfirm.required' => 'יש למלא את שדה אישור הסיסמה',
            'passwordConfirm.same' => 'אישור סיסמה אינו תקין'
        ]);
         if ($validator->fails()) {
            return redirect()
                        ->back()
                        ->withErrors($validator,'userStore')
                        ->withInput();
        }
        
        $user = new User();
        $user-> first_name = $req['firstName'];
        $user-> last_name = $req['lastName'];
        $user-> email = $req['email'];
        $user-> password = bcrypt($req['password']);
        $user-> is_admin = 0;
        $user->save();
        
        Auth::login($user);
        //return Auth::user()->first_name;
        return redirect()->route('home');
    }
}
