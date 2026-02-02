  <div class="product-card bg-white rounded-2xl shadow-xl overflow-hidden shine-effect">
                    <div class="relative">
                        <x-card-top/>
                        <div class="quick-view absolute bottom-4 left-4 right-4">
                            <a href="{{route('product.show', $product->id)}}">
                            <button class="w-full bg-white/95 backdrop-blur-sm text-green-600 font-semibold py-3 rounded-xl hover:bg-white transition shadow-lg">
                                Voir Details
                            </button>
                            </a>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-xs text-green-600 font-semibold uppercase tracking-wide">{{$product->category->name}}</span>
                            <div class="flex items-center space-x-1">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                </svg>
                                <span class="text-sm font-semibold text-green-600">{{$product->stock}}</span>
                            </div>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-2">{{$product->name}}</h3>
                        <p class="text-gray-600 text-sm mb-4">{{ Str::limit($product->description, 70) }}</p>
                        <div class="flex items-center justify-between mb-4">
                            <div>
                                <span class="text-2xl font-bold text-green-600">{{$product->price}} MAD</span>
                                <span class="text-sm text-gray-400 line-through ml-2">110 MAD</span>
                            </div>
                            <div class="flex items-center text-yellow-400">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                </svg>
                                <span class="text-gray-600 text-sm ml-1">4.8</span>
                            </div>
                        </div>
                        <div class="flex gap-2">
                            <button class="flex-1 bg-green-600 hover:bg-green-700 text-white font-semibold py-3 rounded-xl transition transform hover:scale-105 shadow-lg">
                                Ajouter
                            </button>
                            <button class="bg-gray-100 hover:bg-gray-200 text-gray-700 p-3 rounded-xl transition">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>