 <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!-- User details -->
                

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title">Menu</li>


                            {{-- Dashboard --}}
                            <li>
                                <a href="index.html" class="waves-effect">
                                    <span>Dashboard</span>
                                </a>
                            </li>


                            {{-- Manage Suppliers --}}
                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-mail-send-line"></i>
                                    <span>Manage Suppliers</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{route('supplier.all')}}">All Supplier</a></li>
                                </ul>
                            </li>
                            {{-- Manage Suppliers End --}}


                            {{-- Manage Costumers --}}
                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-mail-send-line"></i>
                                    <span>Manage Costumers</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{route('costumer.all')}}">All Costumers</a></li>
                                    <li><a href="{{route('costumer.credit')}}">Credit Costumer</a></li>
                                    <li><a href="{{route('costumer.paid')}}">Paid Costumer</a></li>
                                    <li><a href="{{route('costumer.wise.report')}}">Customer Wise Report</a></li>
                                </ul>
                            </li>
                            {{-- Manage Costumers End --}}



                            {{-- Manage Units --}}
                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-mail-send-line"></i>
                                    <span>Manage Units</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{route('unit.all')}}">All Units</a></li>
                                </ul>
                            </li>
                            {{-- Manage Units End --}}


                            {{-- Manage Category  --}}
                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-mail-send-line"></i>
                                    <span>Manage Category</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{route('category.all')}}">All Categories</a></li>
                                </ul>
                            </li>
                            {{-- Manage Category End --}}


                            {{-- Manage Products --}}
                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-mail-send-line"></i>
                                    <span>Manage Products</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{route('product.all')}}">All Product</a></li>
                                </ul>
                            </li>
                            {{-- Manage Products End --}}


                            {{-- Manage Purchases --}}
                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-mail-send-line"></i>
                                    <span>Manage Purchase</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{route('purchase.all')}}">All Purcheses</a></li>
                                    <li><a href="{{route('purchase.pending')}}">Pending Purcheses</a></li>
                                    <li><a href="{{route('stock.purchase')}}">Daily Purchase Report</a></li>
                                </ul>
                            </li>
                            {{-- Manage Purchases End --}}


                            {{-- Manage Invoice --}}
                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-mail-send-line"></i>
                                    <span>Manage Invoice</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{route('invoice.all')}}">All Invoice</a></li>
                                    <li><a href="{{route('invoice.pending')}}">Pending Invoice</a></li>
                                    <li><a href="{{route('invoice.daily.report')}}">Daily Invoice Report</a></li>
                                    <li><a href="{{route('invoice.print.list')}}">Print Invoice</a></li>
                                </ul>
                            </li>
                            {{-- Manage Invoice End --}}

                            {{-- Dashboard End --}}

                            
                            {{-- Stock  --}}
                            
                            <li class="menu-title">Stock</li>


                            {{-- Manage Stock --}}
                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-account-circle-line"></i>
                                    <span>Manage Stock</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{route('stock.report')}}">Stock Report</a></li>
                                    <li><a href="{{route('stock.spwise')}}">Supplier / Product Wise</a></li>

                                </ul>
                            </li>
                            {{-- Manage Stock End --}}
                           

                            {{-- Stock End --}}
                         

                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>