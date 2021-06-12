<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li>
            <select class="searchable-field form-control">

            </select>
        </li>
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('user_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/permissions*") ? "c-show" : "" }} {{ request()->is("admin/roles*") ? "c-show" : "" }} {{ request()->is("admin/users*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.roles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('user_alert_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.user-alerts.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/user-alerts") || request()->is("admin/user-alerts/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-bell c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userAlert.title') }}
                </a>
            </li>
        @endcan
        @can('affiliate_menu_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/list-products*") ? "c-show" : "" }} {{ request()->is("admin/transaksi-affs*") ? "c-show" : "" }} {{ request()->is("admin/detail-transaksi-affs*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.affiliateMenu.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('list_product_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.list-products.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/list-products") || request()->is("admin/list-products/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-shopping-cart c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.listProduct.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('transaksi_aff_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.transaksi-affs.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/transaksi-affs") || request()->is("admin/transaksi-affs/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.transaksiAff.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('detail_transaksi_aff_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.detail-transaksi-affs.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/detail-transaksi-affs") || request()->is("admin/detail-transaksi-affs/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.detailTransaksiAff.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('cs_menu_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/transaksis*") ? "c-show" : "" }} {{ request()->is("admin/detail-transaksis*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.csMenu.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('transaksi_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.transaksis.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/transaksis") || request()->is("admin/transaksis/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.transaksi.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('detail_transaksi_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.detail-transaksis.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/detail-transaksis") || request()->is("admin/detail-transaksis/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.detailTransaksi.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('master_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/produks*") ? "c-show" : "" }} {{ request()->is("admin/niches*") ? "c-show" : "" }} {{ request()->is("admin/hpps*") ? "c-show" : "" }} {{ request()->is("admin/customer-services*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.master.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('produk_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.produks.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/produks") || request()->is("admin/produks/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.produk.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('niche_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.niches.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/niches") || request()->is("admin/niches/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.niche.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('hpp_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.hpps.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/hpps") || request()->is("admin/hpps/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.hpp.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('customer_service_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.customer-services.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/customer-services") || request()->is("admin/customer-services/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.customerService.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('cash_flow_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/belanjas*") ? "c-show" : "" }} {{ request()->is("admin/penerimaan-cods*") ? "c-show" : "" }} {{ request()->is("admin/detail-penerimaan-cods*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.cashFlow.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('belanja_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.belanjas.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/belanjas") || request()->is("admin/belanjas/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.belanja.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('penerimaan_cod_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.penerimaan-cods.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/penerimaan-cods") || request()->is("admin/penerimaan-cods/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.penerimaanCod.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('detail_penerimaan_cod_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.detail-penerimaan-cods.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/detail-penerimaan-cods") || request()->is("admin/detail-penerimaan-cods/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.detailPenerimaanCod.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @php($unread = \App\Models\QaTopic::unreadCount())
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.messenger.index") }}" class="{{ request()->is("admin/messenger") || request()->is("admin/messenger/*") ? "c-active" : "" }} c-sidebar-nav-link">
                    <i class="c-sidebar-nav-icon fa-fw fa fa-envelope">

                    </i>
                    <span>{{ trans('global.messages') }}</span>
                    @if($unread > 0)
                        <strong>( {{ $unread }} )</strong>
                    @endif

                </a>
            </li>
            @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                @can('profile_password_edit')
                    <li class="c-sidebar-nav-item">
                        <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}" href="{{ route('profile.password.edit') }}">
                            <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                            </i>
                            {{ trans('global.change_password') }}
                        </a>
                    </li>
                @endcan
            @endif
            <li class="c-sidebar-nav-item">
                <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
    </ul>

</div>