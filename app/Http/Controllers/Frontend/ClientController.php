<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Backend\AboutUs;
use App\Models\Backend\Banner;
use App\Models\Backend\Blog;
use App\Models\Backend\Cart;
use App\Models\Backend\Category;
use App\Models\Backend\Contact;
use App\Models\Backend\Faq;
use App\Models\Backend\FooterColumns;
use App\Models\Backend\FooterItem;
use App\Models\Backend\FooterText;
use App\Models\Backend\Image;
use App\Models\Backend\Job;
use App\Models\Backend\Logo;
use App\Models\Backend\Parameter;
use App\Models\Backend\Product;
use App\Models\Backend\Social;
use App\Models\Backend\Term;
use App\Models\Comment;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Reply;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Trez\RayganSms\Facades\RayganSms;

class ClientController extends Controller
{
   public function index(User $user)
   {
      $logos = Logo::query()->get();
      $categories = Category::where('parent_id', 'id', 'category')->get();
      $parameters = Category::query()->get();
      $banners = Banner::query()->get();
      $footerColumns = FooterColumns::query()->get();
      $footerItems = FooterItem::query()->get();
      $footerTexts = FooterText::query()->get();
      $products = Product::query()->get();
      $images = Image::query()->get();
      $contacts = Contact::query()->get();
      $blogs = Blog::query()->get();
      $socials = Social::query()->get();

      if (Auth::user()) {
         $cart = auth()->user()->cart;
         $totalPrice = 0;
         foreach ($cart as $item) {
            $totalPrice += ($item->count * $item->price);
         }
      } else {
         $cart = Cart::where('user_id')->get();
         $totalPrice = 0;
         foreach ($cart as $item) {
            $totalPrice += ($item->count * $item->price);
         }
      }

      return view('pages.index', compact('logos', 'categories', 'parameters', 'banners',
         'footerColumns', 'footerItems', 'footerTexts', 'products', 'images', 'contacts', 'blogs', 'socials',
         'cart', 'totalPrice'));
   }


   public function business()
   {
      $logos = Logo::query()->get();
      $categories = Category::where('parent_id', 'id', 'category')->get();
      $parameters = Category::query()->get();
      $banners = Banner::query()->get();
      $footerColumns = FooterColumns::query()->get();
      $footerItems = FooterItem::query()->get();
      $footerTexts = FooterText::query()->get();
      $products = Product::query()->paginate(3);
      $contacts = Contact::query()->get();
      $blogs = Blog::query()->get();
      $socials = Social::query()->get();

      if (Auth::user()) {
         $cart = auth()->user()->cart;
         $totalPrice = 0;
         foreach ($cart as $item) {
            $totalPrice += ($item->count * $item->price);
         }
      } else {
         $cart = Cart::where('user_id')->get();
         $totalPrice = 0;
         foreach ($cart as $item) {
            $totalPrice += ($item->count * $item->price);
         }
      }

      return view('pages.business', compact('logos', 'categories', 'parameters', 'banners',
         'footerColumns', 'footerItems', 'footerTexts', 'products', 'contacts', 'blogs', 'socials', 'cart',
         'totalPrice'));
   }


   public function product(Category $category, Product $product, User $user, Cart $cart)
   {
      $logos = Logo::query()->get();
      $categories = Category::where('parent_id', 'id', 'category')->get();
      $parameters = Category::query()->get();
      $footerColumns = FooterColumns::query()->get();
      $footerItems = FooterItem::query()->get();
      $footerTexts = FooterText::query()->get();
      $images = Image::query()->get();
      $contacts = Contact::query()->get();
      $category_id = $product->category_id;
      $products = Product::where('category_id', 'LIKE', $category_id)->orderby('id', 'DESC')->paginate(8);
      $socials = Social::query()->get();
      $comments = Comment::where('status', 'LIKE', '1')->orderBy('id', 'DESC')->get();
      $reply = Reply::where('status', '1')->get();

      if (Auth::user()) {
         $cart = auth()->user()->cart;
         $totalPrice = 0;
         foreach ($cart as $item) {
            $totalPrice += ($item->count * $item->price);
         }
      } else {
         $cart = Cart::where('user_id', $user->id)->get();
         $totalPrice = 0;
         foreach ($cart as $item) {
            $totalPrice += ($item->count * $item->price);
         }
      }


      return view('pages.product', compact('logos', 'categories', 'parameters',
         'footerColumns', 'footerItems', 'footerTexts', 'product', 'category', 'images', 'contacts', 'products',
         'socials', 'cart', 'totalPrice', 'comments', 'reply'));
   }


   public function jobs()
   {
      $logos = Logo::query()->get();
      $categories = Category::where('parent_id', 'id', 'category')->get();
      $parameters = Category::query()->get();
      $footerColumns = FooterColumns::query()->get();
      $footerItems = FooterItem::query()->get();
      $footerTexts = FooterText::query()->get();
      $contacts = Contact::query()->get();
      $jobs = Job::query()->get();
      $socials = Social::query()->get();

      if (Auth::user()) {
         $cart = auth()->user()->cart;
         $totalPrice = 0;
         foreach ($cart as $item) {
            $totalPrice += ($item->count * $item->price);
         }
      } else {
         $cart = Cart::where('user_id')->get();
         $totalPrice = 0;
         foreach ($cart as $item) {
            $totalPrice += ($item->count * $item->price);
         }
      }

      return view('pages.jobs', compact('logos', 'categories', 'parameters',
         'footerColumns', 'footerItems', 'footerTexts', 'contacts', 'jobs', 'socials', 'cart', 'totalPrice'));
   }


   public function blogs()
   {
      $logos = Logo::query()->get();
      $categories = Category::where('parent_id', 'id', 'category')->get();
      $parameters = Category::query()->get();
      $footerColumns = FooterColumns::query()->get();
      $footerItems = FooterItem::query()->get();
      $footerTexts = FooterText::query()->get();
      $contacts = Contact::query()->get();
      $blogs = Blog::query()->get();
      $socials = Social::query()->get();

      if (Auth::user()) {
         $cart = auth()->user()->cart;
         $totalPrice = 0;
         foreach ($cart as $item) {
            $totalPrice += ($item->count * $item->price);
         }
      } else {
         $cart = Cart::where('user_id')->get();
         $totalPrice = 0;
         foreach ($cart as $item) {
            $totalPrice += ($item->count * $item->price);
         }
      }

      return view('pages.blogs', compact('logos', 'categories', 'parameters',
         'footerColumns', 'footerItems', 'footerTexts', 'contacts', 'blogs', 'socials', 'cart', 'totalPrice'));
   }


   public function blog(Blog $blog)
   {
      $logos = Logo::query()->get();
      $categories = Category::where('parent_id', 'id', 'category')->get();
      $parameters = Category::query()->get();
      $footerColumns = FooterColumns::query()->get();
      $footerItems = FooterItem::query()->get();
      $footerTexts = FooterText::query()->get();
      $contacts = Contact::query()->get();
      $blogs = Blog::query()->orderBy('id', 'DESC')->paginate(5);
      $socials = Social::query()->get();

      $previous = Blog::where('id', '<', $blog->id)->max('id');
      $next = Blog::where('id', '>', $blog->id)->min('id');

      if (Auth::user()) {
         $cart = auth()->user()->cart;
         $totalPrice = 0;
         foreach ($cart as $item) {
            $totalPrice += ($item->count * $item->price);
         }
      } else {
         $cart = Cart::where('user_id')->get();
         $totalPrice = 0;
         foreach ($cart as $item) {
            $totalPrice += ($item->count * $item->price);
         }
      }

      return view('pages.blog', compact('logos', 'categories', 'parameters',
         'footerColumns', 'footerItems', 'footerTexts', 'contacts', 'blog', 'blogs', 'socials', 'cart',
         'totalPrice'))->with('previous', $previous)->with('next', $next);
   }


   public function allProducts()
   {
      $logos = Logo::query()->get();
      $categories = Category::where('parent_id', 'id', 'category')->get();
      $parameters = Category::query()->get();
      $footerColumns = FooterColumns::query()->get();
      $footerItems = FooterItem::query()->get();
      $footerTexts = FooterText::query()->get();
      $products = Product::query()->get();
      $contacts = Contact::query()->get();
      $socials = Social::query()->get();

      if (Auth::user()) {
         $cart = auth()->user()->cart;
         $totalPrice = 0;
         foreach ($cart as $item) {
            $totalPrice += ($item->count * $item->price);
         }
      } else {
         $cart = Cart::where('user_id')->get();
         $totalPrice = 0;
         foreach ($cart as $item) {
            $totalPrice += ($item->count * $item->price);
         }
      }

      return view('pages.all-products', compact('logos', 'categories', 'parameters',
         'footerColumns', 'footerItems', 'footerTexts', 'products', 'contacts', 'socials', 'cart', 'totalPrice'));
   }


   public function ProductCategory(Category $category, Product $product)
   {
      $logos = Logo::query()->get();
      $categories = Category::where('parent_id', 'id', 'category')->get();
      $parameters = Category::query()->get();
      $footerColumns = FooterColumns::query()->get();
      $footerItems = FooterItem::query()->get();
      $footerTexts = FooterText::query()->get();
      $products = Product::query()->get();
      $contacts = Contact::query()->get();
      $category_parent_id = $category->parent_id;
      $paras = Category::where('parent_id', 'LIKE', $category_parent_id)->get();
      $socials = Social::query()->get();

      if (Auth::user()) {
         $cart = auth()->user()->cart;
         $totalPrice = 0;
         foreach ($cart as $item) {
            $totalPrice += ($item->count * $item->price);
         }
      } else {
         $cart = Cart::where('user_id')->get();
         $totalPrice = 0;
         foreach ($cart as $item) {
            $totalPrice += ($item->count * $item->price);
         }
      }

      return view('pages.product-category', compact('logos', 'categories', 'parameters',
         'footerColumns', 'footerItems', 'footerTexts', 'products', 'contacts', 'category', 'product',
         'paras', 'socials', 'cart', 'totalPrice'));
   }

   //! Account
   public function myAccount()
   {
      $logos = Logo::query()->get();
      $categories = Category::where('parent_id', 'id', 'category')->get();
      $parameters = Category::query()->get();
      $banners = Banner::query()->get();
      $footerColumns = FooterColumns::query()->get();
      $footerItems = FooterItem::query()->get();
      $footerTexts = FooterText::query()->get();
      $products = Product::query()->get();
      $contacts = Contact::query()->get();
      $blogs = Blog::query()->get();
      $socials = Social::query()->get();

      if (Auth::user()) {
         $cart = auth()->user()->cart;
         $totalPrice = 0;
         foreach ($cart as $item) {
            $totalPrice += ($item->count * $item->price);
         }
      } else {
         $cart = Cart::where('user_id')->get();
         $totalPrice = 0;
         foreach ($cart as $item) {
            $totalPrice += ($item->count * $item->price);
         }
      }


      return view('pages.my-account', compact('logos', 'categories', 'parameters', 'banners',
         'footerColumns', 'footerItems', 'footerTexts', 'products', 'contacts', 'blogs', 'socials', 'cart',
         'totalPrice'));
   }


   public function edit_account(User $user)
   {
      $logos = Logo::query()->get();
      $categories = Category::where('parent_id', 'id', 'category')->get();
      $parameters = Category::query()->get();
      $banners = Banner::query()->get();
      $footerColumns = FooterColumns::query()->get();
      $footerItems = FooterItem::query()->get();
      $footerTexts = FooterText::query()->get();
      $products = Product::query()->get();
      $contacts = Contact::query()->get();
      $blogs = Blog::query()->get();
      $socials = Social::query()->get();

      if (Auth::user()) {
         $cart = auth()->user()->cart;
         $totalPrice = 0;
         foreach ($cart as $item) {
            $totalPrice += ($item->count * $item->price);
         }
      } else {
         $cart = Cart::where('user_id')->get();
         $totalPrice = 0;
         foreach ($cart as $item) {
            $totalPrice += ($item->count * $item->price);
         }
      }

      return view('pages.edit-account', compact('logos', 'categories', 'parameters', 'banners',
         'footerColumns', 'footerItems', 'footerTexts', 'products', 'contacts', 'blogs', 'socials', 'cart',
         'totalPrice', 'user'));
   }


   public function my_orders(User $user)
   {
      $logos = Logo::query()->get();
      $categories = Category::where('parent_id', 'id', 'category')->get();
      $parameters = Category::query()->get();
      $banners = Banner::query()->get();
      $footerColumns = FooterColumns::query()->get();
      $footerItems = FooterItem::query()->get();
      $footerTexts = FooterText::query()->get();
      $products = Product::query()->get();
      $contacts = Contact::query()->get();
      $blogs = Blog::query()->get();
      $socials = Social::query()->get();
      $order = Order::where('user_id', Auth::id())->get();

      if (Auth::user()) {
         $cart = auth()->user()->cart;
         $totalPrice = 0;
         foreach ($cart as $item) {
            $totalPrice += ($item->count * $item->price);
         }
      } else {
         $cart = Cart::where('user_id')->get();
         $totalPrice = 0;
         foreach ($cart as $item) {
            $totalPrice += ($item->count * $item->price);
         }
      }

      return view('pages.my-orders', compact('logos', 'categories', 'parameters', 'banners',
         'footerColumns', 'footerItems', 'footerTexts', 'products', 'contacts', 'blogs', 'socials', 'cart',
         'totalPrice', 'user', 'order'));
   }

   //! Account

   public function aboutUs()
   {
      $logos = Logo::query()->get();
      $categories = Category::where('parent_id', 'id', 'category')->get();
      $parameters = Category::query()->get();
      $footerColumns = FooterColumns::query()->get();
      $footerItems = FooterItem::query()->get();
      $footerTexts = FooterText::query()->get();
      $contacts = Contact::query()->get();
      $aboutUss = AboutUs::query()->get();
      $socials = Social::query()->get();

      if (Auth::user()) {
         $cart = auth()->user()->cart;
         $totalPrice = 0;
         foreach ($cart as $item) {
            $totalPrice += ($item->count * $item->price);
         }
      } else {
         $cart = Cart::where('user_id')->get();
         $totalPrice = 0;
         foreach ($cart as $item) {
            $totalPrice += ($item->count * $item->price);
         }
      }

      return view('pages.about-us', compact('logos', 'categories', 'parameters',
         'footerColumns', 'footerItems', 'footerTexts', 'contacts', 'aboutUss', 'socials', 'cart',
         'totalPrice'));
   }


   public function faq()
   {
      $logos = Logo::query()->get();
      $categories = Category::where('parent_id', 'id', 'category')->get();
      $parameters = Category::query()->get();
      $footerColumns = FooterColumns::query()->get();
      $footerItems = FooterItem::query()->get();
      $footerTexts = FooterText::query()->get();
      $contacts = Contact::query()->get();
      $faqs = Faq::query()->get();
      $socials = Social::query()->get();

      if (Auth::user()) {
         $cart = auth()->user()->cart;
         $totalPrice = 0;
         foreach ($cart as $item) {
            $totalPrice += ($item->count * $item->price);
         }
      } else {
         $cart = Cart::where('user_id')->get();
         $totalPrice = 0;
         foreach ($cart as $item) {
            $totalPrice += ($item->count * $item->price);
         }
      }

      return view('pages.faq', compact('logos', 'categories', 'parameters',
         'footerColumns', 'footerItems', 'footerTexts', 'contacts', 'faqs', 'socials', 'cart', 'totalPrice'));
   }


   public function termsAndConditions()
   {
      $logos = Logo::query()->get();
      $categories = Category::where('parent_id', 'id', 'category')->get();
      $parameters = Category::query()->get();
      $footerColumns = FooterColumns::query()->get();
      $footerItems = FooterItem::query()->get();
      $footerTexts = FooterText::query()->get();
      $contacts = Contact::query()->get();
      $terms = Term::query()->get();
      $socials = Social::query()->get();

      if (Auth::user()) {
         $cart = auth()->user()->cart;
         $totalPrice = 0;
         foreach ($cart as $item) {
            $totalPrice += ($item->count * $item->price);
         }
      } else {
         $cart = Cart::where('user_id')->get();
         $totalPrice = 0;
         foreach ($cart as $item) {
            $totalPrice += ($item->count * $item->price);
         }
      }

      return view('pages.terms-and-conditions', compact('logos', 'categories', 'parameters',
         'footerColumns', 'footerItems', 'footerTexts', 'contacts', 'terms', 'socials', 'cart', 'totalPrice'));
   }


   public function contactUs()
   {
      $logos = Logo::query()->get();
      $categories = Category::where('parent_id', 'id', 'category')->get();
      $parameters = Category::query()->get();
      $footerColumns = FooterColumns::query()->get();
      $footerItems = FooterItem::query()->get();
      $footerTexts = FooterText::query()->get();
      $contacts = Contact::query()->get();
      $socials = Social::query()->get();

      if (Auth::user()) {
         $cart = auth()->user()->cart;
         $totalPrice = 0;
         foreach ($cart as $item) {
            $totalPrice += ($item->count * $item->price);
         }
      } else {
         $cart = Cart::where('user_id')->get();
         $totalPrice = 0;
         foreach ($cart as $item) {
            $totalPrice += ($item->count * $item->price);
         }
      }

      return view('pages.contact-us', compact('logos', 'categories', 'parameters',
         'footerColumns', 'footerItems', 'footerTexts', 'contacts', 'socials', 'cart', 'totalPrice'));
   }


   public function search(Request $request)
   {
      $logos = Logo::query()->get();
      $categories = Category::where('parent_id', 'id', 'category')->get();
      $parameters = Category::query()->get();
      $footerColumns = FooterColumns::query()->get();
      $footerItems = FooterItem::query()->get();
      $footerTexts = FooterText::query()->get();
      $contacts = Contact::query()->get();
      $products = Product::orderBy('id', 'DESC')->
      where('title', 'LIKE', '%' . $request->product . '%');
      if ($request->category != "ALL") $products->where('category_id', $request->category);
      $products = $products->get();
      $socials = Social::query()->get();

      if (Auth::user()) {
         $cart = auth()->user()->cart;
         $totalPrice = 0;
         foreach ($cart as $item) {
            $totalPrice += ($item->count * $item->price);
         }
      } else {
         $cart = Cart::where('user_id')->get();
         $totalPrice = 0;
         foreach ($cart as $item) {
            $totalPrice += ($item->count * $item->price);
         }
      }

      return view('pages.search', compact('logos', 'categories', 'parameters',
         'footerColumns', 'footerItems', 'footerTexts', 'contacts', 'products', 'socials', 'cart', 'totalPrice'));
   }


   public function add_to_cart(Product $product)
   {
      if ($item = auth()->user()->cart->where('product_id', $product->id)->first()) {
         $item->increment('count');

      } else {
         auth()->user()->cart()->create([
            'product_id' => $product->id,
            'price' => $product->price,
         ]);
      }

      return redirect()->back();
   }


   public function cart()
   {
      $logos = Logo::query()->get();
      $categories = Category::where('parent_id', 'id', 'category')->get();
      $parameters = Category::query()->get();
      $footerColumns = FooterColumns::query()->get();
      $footerItems = FooterItem::query()->get();
      $footerTexts = FooterText::query()->get();
      $contacts = Contact::query()->get();
      $socials = Social::query()->get();

      if (Auth::user()) {
         $cart = auth()->user()->cart;
         $totalPrice = 0;
         foreach ($cart as $item) {
            $totalPrice += ($item->count * $item->price);
         }
      } else {
         $cart = Cart::where('user_id')->get();
         $totalPrice = 0;
         foreach ($cart as $item) {
            $totalPrice += ($item->count * $item->price);
         }
      }

      return view('pages.cart', compact('logos', 'categories', 'parameters',
         'footerColumns', 'footerItems', 'footerTexts', 'contacts', 'socials', 'cart', 'totalPrice'));
   }


   public function cart_plus(Cart $cart)
   {
      $cart->increment('count');
      return back();
   }


   public function cart_minus(Cart $cart)
   {
      if ($cart->count < 2) {
         $cart->delete();
      } else {
         $cart->decrement('count');
      }
      return back();
   }


   public function cart_remove(Cart $cart)
   {
      $cart->delete();
      return back();
   }


   public function checkout(User $user, Product $product)
   {
      $logos = Logo::query()->get();
      $categories = Category::where('parent_id', 'id', 'category')->get();
      $parameters = Category::query()->get();
      $footerColumns = FooterColumns::query()->get();
      $footerItems = FooterItem::query()->get();
      $footerTexts = FooterText::query()->get();
      $contacts = Contact::query()->get();
      $socials = Social::query()->get();

      if (Auth::user()) {
         $cart = auth()->user()->cart;
         $totalPrice = 0;
         foreach ($cart as $item) {
            $totalPrice += ($item->count * $item->price);
         }
      } else {
         $cart = Cart::where('user_id')->get();
         $totalPrice = 0;
         foreach ($cart as $item) {
            $totalPrice += ($item->count * $item->price);
         }
      }

      return view('pages.checkout', compact('logos', 'categories', 'parameters',
         'footerColumns', 'footerItems', 'footerTexts', 'contacts', 'socials', 'cart', 'totalPrice', 'user',
         'product'));
   }


   public function order(Request $request)
   {
      $cart = auth()->user()->cart;

      $order = new Order();
      $order->user_id = Auth::id();
      $order->name = $request->get('name');
      $order->address = $request->get('address');
      $order->state = $request->get('state');
      $order->city = $request->get('city');
      $order->codePost = $request->get('codePost');
      $order->phoneMain = $request->get('phoneMain');
      $order->phone = $request->get('phone');
      $order->email = $request->get('email');
      $order->description = $request->get('description');
      $order->pay = $request->get('pay');
      $order->agree = $request->get('agree');

      $totalPrice = 0;
      foreach ($cart as $item) {
         $totalPrice += ($item->count * $item->price);
      }

      $order->total_price = $totalPrice;
      $order->tracking_no = rand(11111111, 99999999);
      $order->save();

      foreach ($cart as $item) {
         OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $item->product_id,
            'count' => $item->count,
            'price' => $item->price,
         ]);

         $product = Product::where('id', $item->product_id)->first();
         $product->storage = $product->storage - $item->count;
         $product->update();
      }

      return back();
   }


   public function change(Request $request, User $user)
   {

      $current_user = auth()->user();

      if (Hash::check($request->current_password, $current_user->password)) {
         $user->name = $request->name;
         $user->email = $request->email;
         $user->phone = $request->phone;
         $user->password = Hash::make($request->password);

      } else {
         $user->name = $request->name;
         $user->email = $request->email;
         $user->phone = $request->phone;
      }

      $user->update();
      return back();
   }


   public function comment(Request $request, Product $product)
   {
      $comment = new Comment([
         'user_id' => auth()->user()->id,
         'product_id' => $request->product->id,
         'comment' => $request->comment,
         'rating' => $request->rating,
      ]);
      $comment->save();
      return back();
   }


   public function reply(Request $request)
   {
      $reply = new Reply([
         'user_id' => auth()->user()->id,
         'reply' => $request->reply,
         'comment_id' => $request->comment_id,
      ]);
      $reply->save();
      return back();
   }


   public function login()
   {
      $logos = Logo::query()->get();

      // return view('pages.login', compact('logos'));
   }

}

