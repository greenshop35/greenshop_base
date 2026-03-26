<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class DomainSecurity
{
    /**
     * जानी, अब यहाँ कोई रुकावट नहीं है। 
     * हर रिक्वेस्ट बिना किसी चेक के अंदर आएगी।
     */
    public function handle(Request $request, Closure $next)
    {
        // कोई IP चेक नहीं, कोई ब्लॉकिंग नहीं।
        // सीधी एंट्री!
        
        return $next($request);
    }
}