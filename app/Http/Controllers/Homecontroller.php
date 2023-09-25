<?php

namespace App\Http\Controllers;

use App\Models\menu;
use App\Models\products;
use App\Models\userhomes;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
// use App\Models\User;
// use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;

use function Laravel\Prompts\select;

// use Illuminate\Http\RedirectResponse;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Hash;
// use Illuminate\Validation\Rules;
// use Illuminate\View\View;
class Homecontroller extends Controller
{
    public function home()
    {
        $menunames = menu::all();
        $products = products::all();
        return view('welcome', [
            'activePage' => 'home',
            'menunames' => $menunames,
            'products' => $products,
        ]);
    }
    public function aboutget()
    {
        $menunames = menu::all();
        $products = products::whereIn('id', [30, 46, 49])->get();
        return view('welcome', [
            'activePage' => 'about',
            'menunames' => $menunames,
            'products' => $products
        ]);
    }
    public function contactget()
    {
        $menunames = menu::all();
        return view('welcome', [
            'activePage' => 'contact',
            'menunames' => $menunames,
        ]);
    }
    public function menuhandle($name)
    {
        $menunames = menu::select('name')->get();
        $menuname = menu::where('name', $name)->first();
        $id = $menuname->id;
        $products = products::where('menu_id', $id)->get();
        return view('welcome', [
            'name' => $name,
            'activePage' => 'menuHandle',
            'menunames' => $menunames,
            'products' => $products
        ]);
    }
    public function searchproduct(Request $request)
    {
        $searchname = $request->input('searchname');
        $products = products::where('name', 'LIKE', "%$searchname%")->get();
        return response()->json($products);
    }
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('userhomes')->attempt($credentials)) {
            // Đăng nhập thành công
            return response()->json(['message' => 'success']);
        } else {
            // // Đăng nhập thất bại
            // $errors = ['message' => 'error'];

            // if (!Auth::guard('userhomes')->validate($credentials)) {
            //     $errors['password'] = 'Mật khẩu không đúng';
            // } elseif (!Auth::guard('userhomes')->user()) {
            //     $errors['email'] = 'Email không tồn tại';
            // }

            // return response()->json($errors, 401);
            return response()->json(['message' => 'error']);
        }
    }
    public function register(Request $request)
    {
        // $request->validate([
        //     'name' => ['required', 'string'],
        //     'email' => ['required', 'string', 'email', 'unique:userhomes'],
        //     'password' => ['required', 'string', 'min:8'],
        // ]);

        $userhomes = userhomes::create([
            'name' => $request->registername,
            'email' => $request->registeremail,
            'password' => Hash::make($request->registerpassword),
        ]);

        // event(new Registered($user));

        // Đăng nhập người dùng sau khi đăng ký nếu cần
        // Auth::login($user);

        return response()->json(['message' => 'Đăng ký thành công'], 200);
    }
    public function logout(Request $request)
    {
        Auth::guard('userhomes')->logout();
        $request->session()->regenerateToken();
        return response()->json(['message' => 'logout success']);
    }
    public function changepassword(Request $request)
    {
        // $user = Auth::guard('userhomes')->user();
        // $password = $request->changepassword;
        // if (!Hash::check($request->input('changepassword'), $user->password)) {
        //     return response()->json(['message' => 'Password Ban đầu sai']);
        // }
        // if ($request->changenewpassword != $request->nhaplaipassword) {
        //     return response()->json(['message' => 'Nhập lại mật khẩu đã bị sai']);
        // }
        // $user->password = $password;
        // // $user->save();
        // return response()->json(['message' => 'Thay đổi Password thành công']);
        $newPassword = $request->input('changenewpassword');
        $confirmPassword = $request->input('nhaplaipassword');

        // Kiểm tra mật khẩu mới và xác nhận mật khẩu
        if ($newPassword !== $confirmPassword) {
            return response()->json(['message' => 'Nhập lại mật khẩu không khớp']);
        }

        // Lấy người dùng hiện tại
        $user = Auth::guard('userhomes')->user();

        // Kiểm tra xem người dùng có tồn tại hay không
        if (!$user) {
            return response()->json(['message' => 'Người dùng không tồn tại']);
        }

        // Kiểm tra mật khẩu ban đầu
        if (!Hash::check($request->input('changepassword'), $user->password)) {
            return response()->json(['message' => 'Mật khẩu ban đầu không đúng']);
        }

        // Mã hóa và lưu mật khẩu mới vào cơ sở dữ liệu
        $password = Hash::make($newPassword);
        userhomes::where('id', $user->id)->update(['password' => $password]);

        return response()->json(['message' => 'Thay đổi mật khẩu thành công']);
    }
}
