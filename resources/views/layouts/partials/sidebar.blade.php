@inject('request', 'Illuminate\Http\Request')
<div class="d-print-none bg-gradient-primary"> <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Entelify <sup>1.0</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.html">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        General
      </div>
           

        <!-- <li class="header">HEADER</li> -->
        <li class="nav-item {{ $request->segment(1) == 'home' ? 'active' : '' }}">
          <a href="{{action('HomeController@index')}}" class="nav-link">
            <i class="fa fa-dashboard"></i> <span>
            @lang('home.home')</span>
          </a>
        </li>


        @if(auth()->user()->can('user.view') || auth()->user()->can('user.create') || auth()->user()->can('roles.view'))




        
        <li class="nav-item  {{ in_array($request->segment(1), ['roles', 'users', 'sales-commission-agents']) ? 'active active-sub' : '' }}" >
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUserManagement" aria-expanded="true" aria-controls="collapseUserManagement">
                <i class="fa fa-users"></i>
                <span class="title">@lang('user.user_management')</span>
                <span class="pull-right-container">
                </span>
            </a>
        <div id="collapseUserManagement" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
              @can( 'user.view' )
               
                  <a href="{{action('ManageUserController@index')}}" class="collapse-item">
                      <i class="fa fa-user"></i>
                      <span class="title">
                          @lang('user.users')
                      </span>
                  </a>
              @endcan
              @can('roles.view')
               
                  <a href="{{action('RoleController@index')}}" class="collapse-item">
                      <i class="fa fa-briefcase"></i>
                      <span class="title">
                        @lang('user.roles')
                      </span>
                  </a>
               
              @endcan
              @can('user.create')
               
                  <a href="{{action('SalesCommissionAgentController@index')}}" class="collapse-item">
                      <i class="fa fa-handshake-o"></i>
                      <span class="title">
                        @lang('lang_v1.sales_commission_agents')
                      </span>
                  </a>
              @endcan
            </div>
            </div>
        </li>
        @endif



@if(auth()->user()->can('supplier.view') || auth()->user()->can('customer.view') )


          <li class="nav-item {{ in_array($request->segment(1), ['contacts', 'customer-group']) ? 'active active-sub' : '' }}" id="tour_step4">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSupplier" aria-expanded="true" aria-controls="collapseSupplier"><i class="fa fa-address-book"></i> <span>@lang('contact.contacts')</span>
              <span class="pull-right-container">
              </span>
            </a>
             <div id="collapseSupplier" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
              @can('supplier.view')
                <a href="{{action('ContactController@index', ['type' => 'supplier'])}}" class="collapse-item"><i class="fa fa-star"></i> @lang('report.supplier')</a>
              @endcan

              @can('customer.view')
                <a href="{{action('ContactController@index', ['type' => 'customer'])}}" class="collapse-item"><i class="fa fa-star"></i> @lang('report.customer')</a>
<a href="{{action('CustomerGroupController@index')}}" class="collapse-item"><i class="fa fa-users"></i> @lang('lang_v1.customer_groups')</a>
              @endcan

              @if(auth()->user()->can('supplier.create') || auth()->user()->can('customer.create') )
            <a href="{{action('ContactController@getImportContacts')}}" class="collapse-item"><i class="fa fa-download" ></i> @lang('lang_v1.import_contacts')</a>
              @endcan

            </div></div>
          </li>
        @endif

      

      <!-- Product Management -->
 @if(auth()->user()->can('product.view') || 
        auth()->user()->can('product.create') || 
        auth()->user()->can('brand.view') ||
        auth()->user()->can('unit.view') ||
        auth()->user()->can('category.view') ||
        auth()->user()->can('brand.create') ||
        auth()->user()->can('unit.create') ||
        auth()->user()->can('category.create') )
          <li class="nav-item {{ in_array($request->segment(1), ['variation-templates', 'products', 'labels', 'import-products', 'import-opening-stock', 'selling-price-group', 'brands', 'units', 'categories']) ? 'active active-sub' : '' }}" id="tour_step5">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProducts" aria-expanded="true" aria-controls="collapseProducts"><i class="fa fa-cubes"></i> <span>@lang('sale.products')</span>
              <span class="pull-right-container">
              </span>
            </a>
           <div id="collapseProducts" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
              @can('product.view')
               <a href="{{action('ProductController@index')}}" class="collapse-item"><i class="fa fa-list"></i>@lang('lang_v1.list_products')</a>
              @endcan
              @can('product.create')
              <a href="{{action('ProductController@create')}}" class="collapse-item"><i class="fa fa-plus-circle"></i>@lang('product.add_product')</a>
              @endcan
              @can('product.view')
              <a href="{{action('LabelsController@show')}}" class="collapse-item"><i class="fa fa-barcode"></i>@lang('barcode.print_labels')</a>
              @endcan
              @can('product.create')
               <a href="{{action('VariationTemplateController@index')}}" class="collapse-item"><i class="fa fa-circle-o"></i><span>@lang('product.variations')</span></a>
              @endcan
              @can('product.create')
           <a href="{{action('ImportProductsController@index')}}" class="collapse-item"><i class="fa fa-download"></i><span>@lang('product.import_products')</span></a>
              @endcan
              @can('product.opening_stock')
               <a href="{{action('ImportOpeningStockController@index')}}" class="collapse-item"><i class="fa fa-download"></i><span>@lang('lang_v1.import_opening_stock')</span></a>
              @endcan
              @can('product.create')
             <a href="{{action('SellingPriceGroupController@index')}}" class="collapse-item"><i class="fa fa-circle-o"></i><span>@lang('lang_v1.selling_price_group')</span></a>
              @endcan
              
              @if(auth()->user()->can('unit.view') || auth()->user()->can('unit.create'))
              <a href="{{action('UnitController@index')}}" class="collapse-item">
            <i class="fa fa-balance-scale"></i> <span>@lang('unit.units')</span></a>
               
              @endif

              @if(auth()->user()->can('category.view') || auth()->user()->can('category.create'))
               
                  <a href="{{action('CategoryController@index')}}" class="collapse-item"><i class="fa fa-tags"></i> <span>@lang('category.categories') </span></a>
                
              @endif

              @if(auth()->user()->can('brand.view') || auth()->user()->can('brand.create'))
                 <a href="{{action('BrandController@index')}}" class="collapse-item"><i class="fa fa-diamond"></i> <span>@lang('brand.brands')</span></a>
                
              @endif
</div></div>
          </li>
        @endif
        @if(Module::has('Manufacturing'))
          @includeIf('manufacturing::layouts.partials.sidebar')
        @endif






      <!-- Manage Sale Purchase and Stocks -->
              @if(auth()->user()->can('purchase.view') || auth()->user()->can('purchase.create') || auth()->user()->can('purchase.update') )
        <li class="nav-item {{in_array($request->segment(1), ['purchases', 'purchase-return']) ? 'active active-sub' : '' }}" id="tour_step6">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePURCHASE" aria-expanded="true" aria-controls="collapsePURCHASE"><i class="fa fa-arrow-circle-down"></i> <span>@lang('purchase.purchases')</span>
            <span class="pull-right-container">
            </span>
          </a>
            <div id="collapsePURCHASE" class="collapse" aria-labelledby="headingTwo"          data-parent="#accordionSidebar">
  <div class="bg-white py-2 collapse-inner rounded">
            @can('purchase.view')
         <a href="{{action('PurchaseController@index')}}" class="collapse-item"><i class="fa fa-list"></i>@lang('purchase.list_purchase')</a>
            @endcan
            @can('purchase.create')
            <a href="{{action('PurchaseController@create')}}" class="collapse-item"><i class="fa fa-plus-circle"></i> @lang('purchase.add_purchase')</a>
            @endcan
            @can('purchase.update')
              <a href="{{action('PurchaseReturnController@index')}}" class="collapse-item"><i class="fa fa-undo"></i> @lang('lang_v1.list_purchase_return')</a>
            @endcan
         </div></div>
        </li>
        @endif

        @if(auth()->user()->can('sell.view') || auth()->user()->can('sell.create') || auth()->user()->can('direct_sell.access') ||  auth()->user()->can('view_own_sell_only'))
          <li class="nav-item {{  in_array( $request->segment(1), ['sells', 'pos', 'sell-return', 'ecommerce', 'discount', 'shipments']) ? 'active active-sub' : '' }}" id="tour_step7">
              <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseStocks" aria-expanded="true" aria-controls="collapseStocks">
<i class="fa fa-arrow-circle-up"></i> <span>@lang('sale.sale')</span>
              <span class="pull-right-container">
              </span>
            </a>
            <div id="collapseStocks" class="collapse" aria-labelledby="headingTwo"          data-parent="#accordionSidebar">
  <div class="bg-white py-2 collapse-inner rounded">
              @if(auth()->user()->can('direct_sell.access') ||  auth()->user()->can('view_own_sell_only'))
               <a href="{{action('SellController@index')}}" class="collapse-item"><i class="fa fa-list"></i>@lang('lang_v1.all_sales')</a>
              @endif
              <!-- Call superadmin module if defined -->
              @if(Module::has('Ecommerce'))
                @includeIf('ecommerce::layouts.partials.sell_sidebar')
              @endif
              @can('direct_sell.access')
                <a href="{{action('SellController@create')}}" class="collapse-item"><i class="fa fa-plus-circle"></i>@lang('sale.add_sale')</a>
              @endcan
              @can('sell.view')
              <a href="{{action('SellPosController@index')}}" class="collapse-item"><i class="fa fa-list"></i>@lang('sale.list_pos')</a>
              @endcan
              @can('sell.create')
                <a href="{{action('SellPosController@create')}}" class="collapse-item"><i class="fa fa-plus-circle"></i>@lang('sale.pos_sale')</a>
                <a href="{{action('SellController@getDrafts')}}" class="collapse-item"><i class="fa fa-pencil-square" aria-hidden="true" ></i>@lang('lang_v1.list_drafts')</a>

                <a href="{{action('SellController@getQuotations')}}" class="collapse-item"><i class="fa fa-pencil-square" aria-hidden="true"></i>@lang('lang_v1.list_quotations')</a>
              @endcan
              @can('sell.view')
              <a href="{{action('SellReturnController@index')}}" class="collapse-item"><i class="fa fa-undo"></i>@lang('lang_v1.list_sell_return')</a>
              @endcan

              @can('access_shipping')
                <a href="{{action('SellController@shipments')}}" class="collapse-item"><i class="fa fa-truck"></i>@lang('lang_v1.shipments')</a>
              @endcan
              
              @can('discount.access')
                <a href="{{action('DiscountController@index')}}" class="collapse-item"><i class="fa fa-percent"></i>@lang('lang_v1.discounts')</a>
              @endcan
              
              @if(in_array('subscription', $enabled_modules) && auth()->user()->can('direct_sell.access'))
               <a href="{{action('SellPosController@listSubscriptions')}}" class="collapse-item"><i class="fa fa-recycle"></i>@lang('lang_v1.subscriptions')</a>
              @endif
</div></div>
          </li>
        @endif

        @if(Module::has('Repair'))
          @includeIf('repair::layouts.partials.sidebar')
        @endif

        @if(auth()->user()->can('purchase.view') || auth()->user()->can('purchase.create') )
        <li class="nav-item {{ $request->segment(1) == 'stock-transfers' ? 'active active-sub' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseStockAdjust" aria-expanded="true" aria-controls="collapseStockAdjust">
<i class="fa fa-truck" aria-hidden="true"></i> <span>@lang('lang_v1.stock_transfers')</span>
            <span class="pull-right-container">
            </span>
          </a>
            <div id="collapseStockAdjust" class="collapse" aria-labelledby="headingTwo"          data-parent="#accordionSidebar">
  <div class="bg-white py-2 collapse-inner rounded">

            @can('purchase.view')
              <a href="{{action('StockTransferController@index')}}" class="collapse-item"><i class="fa fa-list"></i>@lang('lang_v1.list_stock_transfers')</a>
            @endcan
            @can('purchase.create')
              <a href="{{action('StockTransferController@create')}}" class="collapse-item"><i class="fa fa-plus-circle"></i>@lang('lang_v1.add_stock_transfer')</a>
            @endcan
</div></div>        </li>
        @endif

        @if(auth()->user()->can('purchase.view') || auth()->user()->can('purchase.create') )
        <li class="nav-item {{ $request->segment(1) == 'stock-adjustments' ? 'active active-sub' : '' }}">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#stock_adjustment" aria-expanded="true" aria-controls="stock_adjustment"><i class="fa fa-database" aria-hidden="true"></i> <span>@lang('stock_adjustment.stock_adjustment')</span>
            <span class="pull-right-container">
            </span>
          </a>
            <div id="stock_adjustment" class="collapse" aria-labelledby="headingTwo"          data-parent="#accordionSidebar">
  <div class="bg-white py-2 collapse-inner rounded">
            @can('purchase.view')
             <a href="{{action('StockAdjustmentController@index')}}" class="collapse-item"><i class="fa fa-list"></i>@lang('stock_adjustment.list')</a>
            @endcan
            @can('purchase.create')
            <a href="{{action('StockAdjustmentController@create')}}" class="collapse-item"><i class="fa fa-plus-circle"></i>@lang('stock_adjustment.add')</a>
            @endcan
          </div></div>
        </li>
        @endif



      <!-- Accounts and Other -->
 

@if(auth()->user()->can('expense.access'))
        <li class="nav-item {{  in_array( $request->segment(1), ['expense-categories', 'expenses']) ? 'active active-sub' : '' }}">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseExpense" aria-expanded="true" aria-controls="collapseExpense"><i class="fa fa-minus-circle"></i> <span>@lang('expense.expenses')</span>
            <span class="pull-right-container">
            </span>
          </a>
          <div id="collapseExpense" class="collapse" aria-labelledby="headingTwo"          data-parent="#accordionSidebar">
  <div class="bg-white py-2 collapse-inner rounded">
           <a href="{{action('ExpenseController@index')}}" class="collapse-item"><i class="fa fa-list"></i>@lang('lang_v1.list_expenses')</a>
            <a href="{{action('ExpenseController@create')}}" class="collapse-item"><i class="fa fa-plus-circle"></i>@lang('messages.add') @lang('expense.expenses')</a>
            <a href="{{action('ExpenseCategoryController@index')}}" class="collapse-item"><i class="fa fa-circle-o"></i>@lang('expense.expense_categories')</a>
         </div></div>
        </li>
        @endif

        @can('account.access')
          @if(in_array('account', $enabled_modules))
            <li class="nav-item {{ $request->segment(1) == 'account' ? 'active active-sub' : '' }}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAccounts" aria-expanded="true" aria-controls="collapseAccounts">
 <span>@lang('lang_v1.payment_accounts')</span>
                <span class="pull-right-container">
                </span>
              </a>
              <div id="collapseAccounts" class="collapse" aria-labelledby="headingTwo"          data-parent="#accordionSidebar">
  <div class="bg-white py-2 collapse-inner rounded">
                  <a href="{{action('AccountController@index')}}" class="collapse-item"><i class="fa fa-list"></i>@lang('account.list_accounts')</a>

                  <a href="{{action('AccountReportsController@balanceSheet')}}" class="collapse-item"><i class="fa fa-book"></i>@lang('account.balance_sheet')</a>

                  <a href="{{action('AccountReportsController@trialBalance')}}" class="collapse-item"><i class="fa fa-balance-scale"></i>@lang('account.trial_balance')</a>

                  <a href="{{action('AccountController@cashFlow')}}" class="collapse-item"><i class="fa fa-exchange"></i><@lang('lang_v1.cash_flow')</a>

                  <a href="{{action('AccountReportsController@paymentAccountReport')}}" class="collapse-item"><i class="fa fa-file-text-o"></i>@lang('account.payment_account_report')</a>              </div></div>
            </li>
          @endif
        @endcan

        @if(auth()->user()->can('purchase_n_sell_report.view') 
          || auth()->user()->can('contacts_report.view') 
          || auth()->user()->can('stock_report.view') 
          || auth()->user()->can('tax_report.view') 
          || auth()->user()->can('trending_product_report.view') 
          || auth()->user()->can('sales_representative.view') 
          || auth()->user()->can('register_report.view')
          || auth()->user()->can('expense_report.view')
          )

          <li class="nav-item {{  in_array( $request->segment(1), ['reports']) ? 'active active-sub' : '' }}" id="tour_step8">
              <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseReports" aria-expanded="true" aria-controls="collapseReports">
<i class="fa fa-bar-chart-o"></i> <span>@lang('report.reports')</span>
              <span class="pull-right-container">
              </span>
            </a>
            <div id="collapseReports" class="collapse" aria-labelledby="headingTwo"          data-parent="#accordionSidebar">
  <div class="bg-white py-2 collapse-inner rounded">
              @can('profit_loss_report.view')
               <a href="{{action('ReportController@getProfitLoss')}}" class="collapse-item"><i class="fa fa-money"></i>@lang('report.profit_loss')</a>
              @endcan

              @can('purchase_n_sell_report.view')
               <a href="{{action('ReportController@getPurchaseSell')}}" class="collapse-item"><i class="fa fa-exchange"></i>@lang('report.purchase_sell_report')</a>
              @endcan

              @can('tax_report.view')
               <a href="{{action('ReportController@getTaxReport')}}" class="collapse-item"><i class="fa fa-tumblr" aria-hidden="true"></i>@lang('report.tax_report')</a>
              @endcan

              @can('contacts_report.view')
                <a href="{{action('ReportController@getCustomerSuppliers')}}" class="collapse-item"><i class="fa fa-address-book"></i>@lang('report.contacts')</a>

                <a href="{{action('ReportController@getCustomerGroup')}}" class="collapse-item"><i class="fa fa-users"></i>@lang('lang_v1.customer_groups_report')</a>
              @endcan
              
              @can('stock_report.view')
                <a href="{{action('ReportController@getStockReport')}}" class="collapse-item"><i class="fa fa-hourglass-half" aria-hidden="true"></i>@lang('report.stock_report')</a>
              @endcan

              @can('stock_report.view')
                @if(session('business.enable_product_expiry') == 1)
               <a href="{{action('ReportController@getStockExpiryReport')}}" class="collapse-item"><i class="fa fa-calendar-times-o"></i>@lang('report.stock_expiry_report')</a>
                @endif
              @endcan

              @can('stock_report.view')
                @if(session('business.enable_lot_number') == 1)
                <a href="{{action('ReportController@getLotReport')}}" class="collapse-item"><i class="fa fa-hourglass-half" aria-hidden="true"></i>@lang('lang_v1.lot_report')</a>
                @endif
              @endcan

              @can('trending_product_report.view')
               <a href="{{action('ReportController@getTrendingProducts')}}" class="collapse-item"><i class="fa fa-line-chart" aria-hidden="true"></i>@lang('report.trending_products')</a>
              @endcan

              @can('stock_report.view')
               <a href="{{action('ReportController@getStockAdjustmentReport')}}" class="collapse-item"><i class="fa fa-sliders"></i>@lang('report.stock_adjustment_report')</a>
              @endcan

              @can('purchase_n_sell_report.view')

               <a href="{{action('ReportController@itemsReport')}}" class="collapse-item"><i class="fa fa-tasks"></i>@lang('lang_v1.items_report')</a>

                <a href="{{action('ReportController@getproductPurchaseReport')}}" class="collapse-item"><i class="fa fa-arrow-circle-down"></i>@lang('lang_v1.product_purchase_report')</a>

                <a href="{{action('ReportController@getproductSellReport')}}" class="collapse-item"><i class="fa fa-arrow-circle-up"></i>@lang('lang_v1.product_sell_report')</a>

                <a href="{{action('ReportController@purchasePaymentReport')}}" class="collapse-item"><i class="fa fa-money"></i>@lang('lang_v1.purchase_payment_report')</a>

                <a href="{{action('ReportController@sellPaymentReport')}}" class="collapse-item"><i class="fa fa-money"></i>@lang('lang_v1.sell_payment_report')</a>
              @endcan

              @can('expense_report.view')
                <a href="{{action('ReportController@getExpenseReport')}}" class="collapse-item"><i class="fa fa-search-minus" aria-hidden="true"></i></i>@lang('report.expense_report')</a>
              @endcan

              @can('register_report.view')
               <a href="{{action('ReportController@getRegisterReport')}}" class="collapse-item"><i class="fa fa-briefcase"></i>@lang('report.register_report')</a>
              @endcan

              @can('sales_representative.view')
               <a href="{{action('ReportController@getSalesRepresentativeReport')}}" class="collapse-item"><i class="fa fa-user" aria-hidden="true"></i>@lang('report.sales_representative')</a>
              @endcan

              @if(in_array('tables', $enabled_modules))
                @can('purchase_n_sell_report.view')
                  <a href="{{action('ReportController@getTableReport')}}" class="collapse-item"><i class="fa fa-table"></i>@lang('restaurant.table_report')</a>
                @endcan
              @endif
              @if(in_array('service_staff', $enabled_modules))
                @can('sales_representative.view')
               <a href="{{action('ReportController@getServiceStaffReport')}}" class="collapse-item"><i class="fa fa-user-secret"></i>@lang('restaurant.service_staff_report')</a>
                @endcan
              @endif

         </div></div>
          </li>
        @endif

        @can('backup')
          <li class="nav-item {{  in_array( $request->segment(1), ['backup']) ? 'active active-sub' : '' }}">
              <a href="{{action('BackUpController@index')}}" class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProducts" aria-expanded="true" aria-controls="collapseProducts"><i class="fa fa-dropbox"></i> <span>@lang('lang_v1.backup')</span>
              </a>
          </li>
        @endrole

        <!-- Call restaurant module if defined -->
        @if(in_array('booking', $enabled_modules))
          @if(auth()->user()->can('crud_all_bookings') || auth()->user()->can('crud_own_bookings') )
          <li class="nav-item {{ $request->segment(1) == 'bookings'? 'active active-sub' : '' }}">
              <a href="{{action('Restaurant\BookingController@index')}}"><i class="fa fa-calendar-check-o"></i> <span>@lang('restaurant.bookings')</span></a>
          </li>
          @endif
        @endif

        @if(in_array('kitchen', $enabled_modules))
          <li class="nav-item {{ $request->segment(1) == 'modules' && $request->segment(2) == 'kitchen' ? 'active active-sub' : '' }}">
              <a href="{{action('Restaurant\KitchenController@index')}}"><i class="fa fa-fire"></i> <span>@lang('restaurant.kitchen')</span></a>
          </li>
        @endif
        @if(in_array('service_staff', $enabled_modules))
          <li class="nav-item {{ $request->segment(1) == 'modules' && $request->segment(2) == 'orders' ? 'active active-sub' : '' }}">
              <a href="{{action('Restaurant\OrderController@index')}}"><i class="fa fa-list-alt"></i> <span>@lang('restaurant.orders')</span></a>
          </li>
        @endif






        @can('send_notifications')
          <li class="nav-item {{  $request->segment(1) == 'notification-templates' ? 'active active-sub' : '' }}">
              <a href="{{action('NotificationTemplateController@index')}}" class="nav-link"><i class="fa fa-envelope"></i> <span>@lang('lang_v1.notification_templates')</span>
              </a>
          </li>
        @endrole
        
        @if(auth()->user()->can('business_settings.access') || 
        auth()->user()->can('barcode_settings.access') ||
        auth()->user()->can('invoice_settings.access') ||
        auth()->user()->can('tax_rate.view') ||
        auth()->user()->can('tax_rate.create'))
        
        
        <li class="nav-item @if( in_array($request->segment(1), ['business', 'tax-rates', 'barcodes', 'invoice-schemes', 'business-location', 'invoice-layouts', 'printers', 'subscription']) || in_array($request->segment(2), ['tables', 'modifiers']) ) {{'active active-sub'}} @endif">
        
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBizSettings" aria-expanded="true" aria-controls="collapseBizSettings"><i class="fa fa-cog"></i> <span>@lang('business.settings')</span>
            <span class="pull-right-container">
            </span>
          </a>
            <div id="collapseBizSettings" class="collapse" aria-labelledby="headingTwo"          data-parent="#accordionSidebar">
  <div class="bg-white py-2 collapse-inner rounded">
            @can('business_settings.access')
              
                <a href="{{action('BusinessController@getBusinessSettings')}}" id="tour_step2" class="collapse-item"><i class="fa fa-cogs"></i> @lang('business.business_settings')</a>
             
                <a href="{{action('BusinessLocationController@index')}}" class="collapse-item"><i class="fa fa-map-marker"></i> @lang('business.business_locations')</a>
            @endcan
            @can('invoice_settings.access')
             
                <a href="{{action('InvoiceSchemeController@index')}}" class="collapse-item"><i class="fa fa-file"></i> <span>@lang('invoice.invoice_settings')</span></a>
            @endcan
            
            @can('barcode_settings.access')
            <a href="{{action('BarcodeController@index')}}" class="collapse-item"><i class="fa fa-barcode"></i> <span>@lang('barcode.barcode_settings')</span></a>
            @endcan

             <a href="{{action('PrinterController@index')}}" class="collapse-item"><i class="fa fa-share-alt"></i> <span>@lang('printer.receipt_printers')</span></a>

            @if(auth()->user()->can('tax_rate.view') || auth()->user()->can('tax_rate.create'))
             
                <a href="{{action('TaxRateController@index')}}" class="collapse-item"><i class="fa fa-bolt"></i> <span>@lang('tax_rate.tax_rates')</span></a>
            @endif

            @if(in_array('tables', $enabled_modules))
               @can('business_settings.access')
                
                  <a href="{{action('Restaurant\TableController@index')}}" class="collapse-item"><i class="fa fa-table"></i> @lang('restaurant.tables')</a>
              @endcan
            @endif

            @if(in_array('modifiers', $enabled_modules))
              @if(auth()->user()->can('product.view') || auth()->user()->can('product.create') )
               <a href="{{action('Restaurant\ModifierSetsController@index')}}" class="collapse-item"><i class="fa fa-delicious"></i> @lang('restaurant.modifiers')</a>
              @endif
            @endif

            @if(Module::has('Superadmin'))
              @includeIf('superadmin::layouts.partials.subscription')
            @endif

          </div></div>
        </li>
        @endif
        <!-- call Essentials module if defined -->
        @if(Module::has('Essentials'))
          @includeIf('essentials::layouts.partials.sidebar_hrm')
          @includeIf('essentials::layouts.partials.sidebar')
        @endif
        
        @if(Module::has('Woocommerce'))
          @includeIf('woocommerce::layouts.partials.sidebar')
        @endif




      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->
  </div>
