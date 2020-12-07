@extends('layouts.home.master')
@section('breadcrumb')
<div class="shop-page-title category-page-title page-title ">
    <div class="page-title-inner flex-row  medium-flex-wrap container">
        <div class="flex-col flex-grow medium-text-center">
            <div class="is-medium">
                <nav class="woocommerce-breadcrumb breadcrumbs uppercase"><a href="https://khanomi.vn">Trang chủ</a>
                    <span class="divider">/</span> Khăn lạnh màng ghép</nav>
            </div>
            <div class="category-filtering category-filter-row show-for-medium"> <a href="#" data-open="#shop-sidebar"
                    data-visible-after="true" data-pos="left" class="filter-button uppercase plain"> <i
                        class="icon-menu"></i> <strong>Lọc</strong> </a>
                <div class="inline-block"></div>
            </div>
        </div>
        <div class="flex-col medium-text-center">
            <p class="woocommerce-result-count hide-for-medium"> Showing all 8 results</p>
            <form class="woocommerce-ordering" method="get"> <select name="orderby" class="orderby"
                    aria-label="Đơn hàng của cửa hàng">
                    <option value="menu_order" selected="selected">Thứ tự mặc định</option>
                    <option value="popularity">Thứ tự theo mức độ phổ biến</option>
                    <option value="rating">Thứ tự theo điểm đánh giá</option>
                    <option value="date">Mới nhất</option>
                    <option value="price">Thứ tự theo giá: thấp đến cao</option>
                    <option value="price-desc">Thứ tự theo giá: cao xuống thấp</option>
                </select> <input type="hidden" name="paged" value="1"></form>
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="row category-page-row">
    <div class="col large-3 hide-for-medium ">
        <div id="shop-sidebar" class="sidebar-inner col-inner">
            <aside id="woocommerce_product_categories-2" class="widget woocommerce widget_product_categories"><span
                    class="widget-title shop-sidebar">Danh mục sản phẩm</span>
                <div class="is-divider small"></div>
                <ul class="product-categories">
                    <li class="cat-item cat-item-66"><a
                            href="https://khanomi.vn/danh-muc/bao-dua-bao-muong-quyen-order/">Bao đũa - Bao muỗng -
                            Quyển order</a> <span class="count">(4)</span></li>
                    <li class="cat-item cat-item-65"><a href="https://khanomi.vn/danh-muc/bao-tam/">Bao tăm</a> <span
                            class="count">(4)</span></li>
                    <li class="cat-item cat-item-30"><a href="https://khanomi.vn/danh-muc/giay-ve-sinh/">Giấy vệ
                            sinh</a> <span class="count">(4)</span></li>
                    <li class="cat-item cat-item-70 current-cat active"><a
                            href="https://khanomi.vn/danh-muc/khan-lanh-mang-ghep/">Khăn lạnh màng ghép</a> <span
                            class="count">(8)</span></li>
                    <li class="cat-item cat-item-15"><a href="https://khanomi.vn/danh-muc/khan-lanh-mang-ngoc/">Khăn
                            lạnh màng ngọc</a> <span class="count">(8)</span></li>
                    <li class="cat-item cat-item-99"><a href="https://khanomi.vn/danh-muc/may-san-xuat-khan-lanh/">Máy
                            sản xuất khăn lạnh</a> <span class="count">(3)</span></li>
                    <li class="cat-item cat-item-102"><a
                            href="https://khanomi.vn/danh-muc/nguyen-lieu-san-xuat-khan-lanh/">Nguyên liệu sản xuất khăn
                            lạnh</a> <span class="count">(2)</span></li>
                    <li class="cat-item cat-item-101"><a
                            href="https://khanomi.vn/danh-muc/vai-khong-det-lam-khan-lanh/">Vải không dệt làm khăn
                            lạnh</a> <span class="count">(4)</span></li>
                </ul>
            </aside>
            <aside id="woof_widget-2" class="widget WOOF_Widget">
                <div class="widget widget-woof">
                    <div class="woof woof_sid woof_sid_widget" data-sid="widget"
                        data-shortcode="woof sid='widget' start_filtering_btn='0' price_filter='0' redirect='' ajax_redraw='0' "
                        data-redirect="" data-autosubmit="1" data-ajax-redraw="0"><a href="#" class="woof_edit_view"
                            data-sid="widget">show blocks helper</a>
                        <div></div>
                        <div class="woof_redraw_zone" data-woof-ver="2.1.7">
                            <div class="woof_submit_search_form_container"></div>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </div>
    <div class="col large-9">
        <div class="shop-container">
            <div class="woocommerce-notices-wrapper"></div>
            <div class="woof_products_top_panel" style="display: none;"></div>
            <div class="products row row-small large-columns-4 medium-columns-3 small-columns-2 has-equal-box-heights">
                <div
                    class="product-small col has-hover product type-product post-1189 status-publish first instock product_cat-khan-lanh-mang-ghep has-post-thumbnail sale shipping-taxable purchasable product-type-simple">
                    <div class="col-inner">
                        <div class="badge-container absolute left top z-1">
                            <div class="callout badge badge-square">
                                <div class="badge-inner secondary on-sale"><span class="onsale">-20%</span></div>
                            </div>
                        </div>
                        <div class="product-small box ">
                            <div class="box-image">
                                <div class="image-zoom"> <a
                                        href="https://khanomi.vn/san-pham/khan-lanh-mang-ghep-mau-01/"> <img width="300"
                                            height="300"
                                            src="https://khanomi.vn/wp-content/uploads/2019/07/1-1-300x300.jpg"
                                            data-src="https://khanomi.vn/wp-content/uploads/2019/07/1-1-300x300.jpg"
                                            class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail lazy-load-active"
                                            alt=""
                                            srcset="https://khanomi.vn/wp-content/uploads/2019/07/1-1-300x300.jpg 300w, https://khanomi.vn/wp-content/uploads/2019/07/1-1-150x150.jpg 150w, https://khanomi.vn/wp-content/uploads/2019/07/1-1-100x100.jpg 100w"
                                            data-srcset="https://khanomi.vn/wp-content/uploads/2019/07/1-1-300x300.jpg 300w, https://khanomi.vn/wp-content/uploads/2019/07/1-1-150x150.jpg 150w, https://khanomi.vn/wp-content/uploads/2019/07/1-1-100x100.jpg 100w"
                                            sizes="(max-width: 300px) 100vw, 300px"> </a></div>
                                <div class="image-tools is-small top right show-on-hover"></div>
                                <div class="image-tools is-small hide-for-small bottom left show-on-hover"></div>
                                <div
                                    class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                                </div>
                            </div>
                            <div class="box-text box-text-products">
                                <div class="title-wrapper">
                                    <p class="name product-title"><a
                                            href="https://khanomi.vn/san-pham/khan-lanh-mang-ghep-mau-01/">Khăn lạnh
                                            màng ghép – Mẫu 01</a></p>
                                </div>
                                <div class="price-wrapper"> <span class="price"><del><span
                                                class="woocommerce-Price-amount amount">500<span
                                                    class="woocommerce-Price-currencySymbol">₫</span></span></del>
                                        <ins><span class="woocommerce-Price-amount amount">400<span
                                                    class="woocommerce-Price-currencySymbol">₫</span></span></ins></span>
                                </div>
                                <div class="add-to-cart-button"><a href="?add-to-cart=1189" data-quantity="1"
                                        class="primary is-small mb-0 button product_type_simple add_to_cart_button ajax_add_to_cart is-flat"
                                        data-product_id="1189" data-product_sku=""
                                        aria-label="Thêm “Khăn lạnh màng ghép - Mẫu 01” vào giỏ hàng" rel="nofollow">Mua
                                        hàng</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="product-small col has-hover product type-product post-1191 status-publish instock product_cat-khan-lanh-mang-ghep product_tag-khan-lanh-mang-ghep has-post-thumbnail sale shipping-taxable purchasable product-type-simple">
                    <div class="col-inner">
                        <div class="badge-container absolute left top z-1">
                            <div class="callout badge badge-square">
                                <div class="badge-inner secondary on-sale"><span class="onsale">-20%</span></div>
                            </div>
                        </div>
                        <div class="product-small box ">
                            <div class="box-image">
                                <div class="image-zoom"> <a
                                        href="https://khanomi.vn/san-pham/khan-lanh-mang-ghep-mau-02/"> <img width="300"
                                            height="300"
                                            src="https://khanomi.vn/wp-content/uploads/2019/07/2-1-300x300.jpg"
                                            data-src="https://khanomi.vn/wp-content/uploads/2019/07/2-1-300x300.jpg"
                                            class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail lazy-load-active"
                                            alt=""
                                            srcset="https://khanomi.vn/wp-content/uploads/2019/07/2-1-300x300.jpg 300w, https://khanomi.vn/wp-content/uploads/2019/07/2-1-150x150.jpg 150w, https://khanomi.vn/wp-content/uploads/2019/07/2-1-100x100.jpg 100w"
                                            data-srcset="https://khanomi.vn/wp-content/uploads/2019/07/2-1-300x300.jpg 300w, https://khanomi.vn/wp-content/uploads/2019/07/2-1-150x150.jpg 150w, https://khanomi.vn/wp-content/uploads/2019/07/2-1-100x100.jpg 100w"
                                            sizes="(max-width: 300px) 100vw, 300px"> </a></div>
                                <div class="image-tools is-small top right show-on-hover"></div>
                                <div class="image-tools is-small hide-for-small bottom left show-on-hover"></div>
                                <div
                                    class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                                </div>
                            </div>
                            <div class="box-text box-text-products">
                                <div class="title-wrapper">
                                    <p class="name product-title"><a
                                            href="https://khanomi.vn/san-pham/khan-lanh-mang-ghep-mau-02/">Khăn lạnh
                                            màng ghép – Mẫu 02</a></p>
                                </div>
                                <div class="price-wrapper"> <span class="price"><del><span
                                                class="woocommerce-Price-amount amount">500<span
                                                    class="woocommerce-Price-currencySymbol">₫</span></span></del>
                                        <ins><span class="woocommerce-Price-amount amount">400<span
                                                    class="woocommerce-Price-currencySymbol">₫</span></span></ins></span>
                                </div>
                                <div class="add-to-cart-button"><a href="?add-to-cart=1191" data-quantity="1"
                                        class="primary is-small mb-0 button product_type_simple add_to_cart_button ajax_add_to_cart is-flat"
                                        data-product_id="1191" data-product_sku=""
                                        aria-label="Thêm “Khăn lạnh màng ghép - Mẫu 02” vào giỏ hàng" rel="nofollow">Mua
                                        hàng</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="product-small col has-hover product type-product post-1193 status-publish instock product_cat-khan-lanh-mang-ghep product_tag-khan-lanh-mang-ghep has-post-thumbnail sale shipping-taxable purchasable product-type-simple">
                    <div class="col-inner">
                        <div class="badge-container absolute left top z-1">
                            <div class="callout badge badge-square">
                                <div class="badge-inner secondary on-sale"><span class="onsale">-20%</span></div>
                            </div>
                        </div>
                        <div class="product-small box ">
                            <div class="box-image">
                                <div class="image-zoom"> <a
                                        href="https://khanomi.vn/san-pham/khan-lanh-mang-ghep-mau-03/"> <img width="300"
                                            height="300"
                                            src="https://khanomi.vn/wp-content/uploads/2019/07/3-1-300x300.jpg"
                                            data-src="https://khanomi.vn/wp-content/uploads/2019/07/3-1-300x300.jpg"
                                            class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail lazy-load-active"
                                            alt=""
                                            srcset="https://khanomi.vn/wp-content/uploads/2019/07/3-1-300x300.jpg 300w, https://khanomi.vn/wp-content/uploads/2019/07/3-1-150x150.jpg 150w, https://khanomi.vn/wp-content/uploads/2019/07/3-1-100x100.jpg 100w"
                                            data-srcset="https://khanomi.vn/wp-content/uploads/2019/07/3-1-300x300.jpg 300w, https://khanomi.vn/wp-content/uploads/2019/07/3-1-150x150.jpg 150w, https://khanomi.vn/wp-content/uploads/2019/07/3-1-100x100.jpg 100w"
                                            sizes="(max-width: 300px) 100vw, 300px"> </a></div>
                                <div class="image-tools is-small top right show-on-hover"></div>
                                <div class="image-tools is-small hide-for-small bottom left show-on-hover"></div>
                                <div
                                    class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                                </div>
                            </div>
                            <div class="box-text box-text-products">
                                <div class="title-wrapper">
                                    <p class="name product-title"><a
                                            href="https://khanomi.vn/san-pham/khan-lanh-mang-ghep-mau-03/">Khăn lạnh
                                            màng ghép – Mẫu 03</a></p>
                                </div>
                                <div class="price-wrapper"> <span class="price"><del><span
                                                class="woocommerce-Price-amount amount">500<span
                                                    class="woocommerce-Price-currencySymbol">₫</span></span></del>
                                        <ins><span class="woocommerce-Price-amount amount">400<span
                                                    class="woocommerce-Price-currencySymbol">₫</span></span></ins></span>
                                </div>
                                <div class="add-to-cart-button"><a href="?add-to-cart=1193" data-quantity="1"
                                        class="primary is-small mb-0 button product_type_simple add_to_cart_button ajax_add_to_cart is-flat"
                                        data-product_id="1193" data-product_sku=""
                                        aria-label="Thêm “Khăn lạnh màng ghép - Mẫu 03” vào giỏ hàng" rel="nofollow">Mua
                                        hàng</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="product-small col has-hover product type-product post-1198 status-publish last instock product_cat-khan-lanh-mang-ghep product_tag-khan-lanh-mang-ghep has-post-thumbnail sale shipping-taxable purchasable product-type-simple">
                    <div class="col-inner">
                        <div class="badge-container absolute left top z-1">
                            <div class="callout badge badge-square">
                                <div class="badge-inner secondary on-sale"><span class="onsale">-20%</span></div>
                            </div>
                        </div>
                        <div class="product-small box ">
                            <div class="box-image">
                                <div class="image-zoom"> <a
                                        href="https://khanomi.vn/san-pham/khan-lanh-mang-ghep-mau-05/"> <img width="300"
                                            height="300"
                                            src="https://khanomi.vn/wp-content/uploads/2019/07/5-1-300x300.jpg"
                                            data-src="https://khanomi.vn/wp-content/uploads/2019/07/5-1-300x300.jpg"
                                            class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail lazy-load-active"
                                            alt=""
                                            srcset="https://khanomi.vn/wp-content/uploads/2019/07/5-1-300x300.jpg 300w, https://khanomi.vn/wp-content/uploads/2019/07/5-1-150x150.jpg 150w, https://khanomi.vn/wp-content/uploads/2019/07/5-1-100x100.jpg 100w"
                                            data-srcset="https://khanomi.vn/wp-content/uploads/2019/07/5-1-300x300.jpg 300w, https://khanomi.vn/wp-content/uploads/2019/07/5-1-150x150.jpg 150w, https://khanomi.vn/wp-content/uploads/2019/07/5-1-100x100.jpg 100w"
                                            sizes="(max-width: 300px) 100vw, 300px"> </a></div>
                                <div class="image-tools is-small top right show-on-hover"></div>
                                <div class="image-tools is-small hide-for-small bottom left show-on-hover"></div>
                                <div
                                    class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                                </div>
                            </div>
                            <div class="box-text box-text-products">
                                <div class="title-wrapper">
                                    <p class="name product-title"><a
                                            href="https://khanomi.vn/san-pham/khan-lanh-mang-ghep-mau-05/">Khăn lạnh
                                            màng ghép – Mẫu 05</a></p>
                                </div>
                                <div class="price-wrapper"> <span class="price"><del><span
                                                class="woocommerce-Price-amount amount">500<span
                                                    class="woocommerce-Price-currencySymbol">₫</span></span></del>
                                        <ins><span class="woocommerce-Price-amount amount">400<span
                                                    class="woocommerce-Price-currencySymbol">₫</span></span></ins></span>
                                </div>
                                <div class="add-to-cart-button"><a href="?add-to-cart=1198" data-quantity="1"
                                        class="primary is-small mb-0 button product_type_simple add_to_cart_button ajax_add_to_cart is-flat"
                                        data-product_id="1198" data-product_sku=""
                                        aria-label="Thêm “Khăn lạnh màng ghép - Mẫu 05” vào giỏ hàng" rel="nofollow">Mua
                                        hàng</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="product-small col has-hover product type-product post-1202 status-publish first instock product_cat-khan-lanh-mang-ghep product_tag-khan-lanh-mang-ghep has-post-thumbnail sale shipping-taxable purchasable product-type-simple">
                    <div class="col-inner">
                        <div class="badge-container absolute left top z-1">
                            <div class="callout badge badge-square">
                                <div class="badge-inner secondary on-sale"><span class="onsale">-20%</span></div>
                            </div>
                        </div>
                        <div class="product-small box ">
                            <div class="box-image">
                                <div class="image-zoom"> <a
                                        href="https://khanomi.vn/san-pham/khan-lanh-mang-ghep-mau-07/"> <img width="300"
                                            height="300"
                                            src="https://khanomi.vn/wp-content/uploads/2019/07/7-1-300x300.jpg"
                                            data-src="https://khanomi.vn/wp-content/uploads/2019/07/7-1-300x300.jpg"
                                            class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail lazy-load-active"
                                            alt=""
                                            srcset="https://khanomi.vn/wp-content/uploads/2019/07/7-1-300x300.jpg 300w, https://khanomi.vn/wp-content/uploads/2019/07/7-1-150x150.jpg 150w, https://khanomi.vn/wp-content/uploads/2019/07/7-1-100x100.jpg 100w"
                                            data-srcset="https://khanomi.vn/wp-content/uploads/2019/07/7-1-300x300.jpg 300w, https://khanomi.vn/wp-content/uploads/2019/07/7-1-150x150.jpg 150w, https://khanomi.vn/wp-content/uploads/2019/07/7-1-100x100.jpg 100w"
                                            sizes="(max-width: 300px) 100vw, 300px"> </a></div>
                                <div class="image-tools is-small top right show-on-hover"></div>
                                <div class="image-tools is-small hide-for-small bottom left show-on-hover"></div>
                                <div
                                    class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                                </div>
                            </div>
                            <div class="box-text box-text-products">
                                <div class="title-wrapper">
                                    <p class="name product-title"><a
                                            href="https://khanomi.vn/san-pham/khan-lanh-mang-ghep-mau-07/">Khăn lạnh
                                            màng ghép – Mẫu 07</a></p>
                                </div>
                                <div class="price-wrapper"> <span class="price"><del><span
                                                class="woocommerce-Price-amount amount">500<span
                                                    class="woocommerce-Price-currencySymbol">₫</span></span></del>
                                        <ins><span class="woocommerce-Price-amount amount">400<span
                                                    class="woocommerce-Price-currencySymbol">₫</span></span></ins></span>
                                </div>
                                <div class="add-to-cart-button"><a href="?add-to-cart=1202" data-quantity="1"
                                        class="primary is-small mb-0 button product_type_simple add_to_cart_button ajax_add_to_cart is-flat"
                                        data-product_id="1202" data-product_sku=""
                                        aria-label="Thêm “Khăn lạnh màng ghép - Mẫu 07” vào giỏ hàng" rel="nofollow">Mua
                                        hàng</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="product-small col has-hover product type-product post-1206 status-publish instock product_cat-khan-lanh-mang-ghep product_tag-khan-lanh-mang-ghep has-post-thumbnail sale shipping-taxable purchasable product-type-simple">
                    <div class="col-inner">
                        <div class="badge-container absolute left top z-1">
                            <div class="callout badge badge-square">
                                <div class="badge-inner secondary on-sale"><span class="onsale">-20%</span></div>
                            </div>
                        </div>
                        <div class="product-small box ">
                            <div class="box-image">
                                <div class="image-zoom"> <a
                                        href="https://khanomi.vn/san-pham/khan-lanh-mang-ghep-mau-4/"> <img width="300"
                                            height="300"
                                            src="https://khanomi.vn/wp-content/uploads/2019/07/8-1-300x300.jpg"
                                            data-src="https://khanomi.vn/wp-content/uploads/2019/07/8-1-300x300.jpg"
                                            class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail lazy-load-active"
                                            alt=""
                                            srcset="https://khanomi.vn/wp-content/uploads/2019/07/8-1-300x300.jpg 300w, https://khanomi.vn/wp-content/uploads/2019/07/8-1-150x150.jpg 150w, https://khanomi.vn/wp-content/uploads/2019/07/8-1-100x100.jpg 100w"
                                            data-srcset="https://khanomi.vn/wp-content/uploads/2019/07/8-1-300x300.jpg 300w, https://khanomi.vn/wp-content/uploads/2019/07/8-1-150x150.jpg 150w, https://khanomi.vn/wp-content/uploads/2019/07/8-1-100x100.jpg 100w"
                                            sizes="(max-width: 300px) 100vw, 300px"> </a></div>
                                <div class="image-tools is-small top right show-on-hover"></div>
                                <div class="image-tools is-small hide-for-small bottom left show-on-hover"></div>
                                <div
                                    class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                                </div>
                            </div>
                            <div class="box-text box-text-products">
                                <div class="title-wrapper">
                                    <p class="name product-title"><a
                                            href="https://khanomi.vn/san-pham/khan-lanh-mang-ghep-mau-4/">Khăn lạnh màng
                                            ghép – Mẫu 4</a></p>
                                </div>
                                <div class="price-wrapper"> <span class="price"><del><span
                                                class="woocommerce-Price-amount amount">500<span
                                                    class="woocommerce-Price-currencySymbol">₫</span></span></del>
                                        <ins><span class="woocommerce-Price-amount amount">400<span
                                                    class="woocommerce-Price-currencySymbol">₫</span></span></ins></span>
                                </div>
                                <div class="add-to-cart-button"><a href="?add-to-cart=1206" data-quantity="1"
                                        class="primary is-small mb-0 button product_type_simple add_to_cart_button ajax_add_to_cart is-flat"
                                        data-product_id="1206" data-product_sku=""
                                        aria-label="Thêm “Khăn lạnh màng ghép - Mẫu 4” vào giỏ hàng" rel="nofollow">Mua
                                        hàng</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="product-small col has-hover product type-product post-1259 status-publish instock product_cat-khan-lanh-mang-ghep product_tag-khan-lanh-man-ghep has-post-thumbnail sale shipping-taxable purchasable product-type-simple">
                    <div class="col-inner">
                        <div class="badge-container absolute left top z-1">
                            <div class="callout badge badge-square">
                                <div class="badge-inner secondary on-sale"><span class="onsale">-20%</span></div>
                            </div>
                        </div>
                        <div class="product-small box ">
                            <div class="box-image">
                                <div class="image-zoom"> <a
                                        href="https://khanomi.vn/san-pham/khan-lanh-man-ghep-mau-6/"> <img width="300"
                                            height="300"
                                            src="https://khanomi.vn/wp-content/uploads/2019/07/11-1-300x300.jpg"
                                            data-src="https://khanomi.vn/wp-content/uploads/2019/07/11-1-300x300.jpg"
                                            class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail lazy-load-active"
                                            alt=""
                                            srcset="https://khanomi.vn/wp-content/uploads/2019/07/11-1-300x300.jpg 300w, https://khanomi.vn/wp-content/uploads/2019/07/11-1-150x150.jpg 150w, https://khanomi.vn/wp-content/uploads/2019/07/11-1-100x100.jpg 100w"
                                            data-srcset="https://khanomi.vn/wp-content/uploads/2019/07/11-1-300x300.jpg 300w, https://khanomi.vn/wp-content/uploads/2019/07/11-1-150x150.jpg 150w, https://khanomi.vn/wp-content/uploads/2019/07/11-1-100x100.jpg 100w"
                                            sizes="(max-width: 300px) 100vw, 300px"> </a></div>
                                <div class="image-tools is-small top right show-on-hover"></div>
                                <div class="image-tools is-small hide-for-small bottom left show-on-hover"></div>
                                <div
                                    class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                                </div>
                            </div>
                            <div class="box-text box-text-products">
                                <div class="title-wrapper">
                                    <p class="name product-title"><a
                                            href="https://khanomi.vn/san-pham/khan-lanh-man-ghep-mau-6/">Khăn lạnh màng
                                            ghép – Mẫu 6</a></p>
                                </div>
                                <div class="price-wrapper"> <span class="price"><del><span
                                                class="woocommerce-Price-amount amount">500<span
                                                    class="woocommerce-Price-currencySymbol">₫</span></span></del>
                                        <ins><span class="woocommerce-Price-amount amount">400<span
                                                    class="woocommerce-Price-currencySymbol">₫</span></span></ins></span>
                                </div>
                                <div class="add-to-cart-button"><a href="?add-to-cart=1259" data-quantity="1"
                                        class="primary is-small mb-0 button product_type_simple add_to_cart_button ajax_add_to_cart is-flat"
                                        data-product_id="1259" data-product_sku=""
                                        aria-label="Thêm “Khăn lạnh màng ghép - Mẫu 6” vào giỏ hàng" rel="nofollow">Mua
                                        hàng</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="product-small col has-hover product type-product post-1261 status-publish last instock product_cat-khan-lanh-mang-ghep product_tag-khan-lanh-man-ghep has-post-thumbnail sale shipping-taxable purchasable product-type-simple">
                    <div class="col-inner">
                        <div class="badge-container absolute left top z-1">
                            <div class="callout badge badge-square">
                                <div class="badge-inner secondary on-sale"><span class="onsale">-20%</span></div>
                            </div>
                        </div>
                        <div class="product-small box ">
                            <div class="box-image">
                                <div class="image-zoom"> <a
                                        href="https://khanomi.vn/san-pham/khan-lanh-man-ghep-mau-8/"> <img width="300"
                                            height="300"
                                            src="https://khanomi.vn/wp-content/uploads/2019/07/12.-300x300.jpg"
                                            data-src="https://khanomi.vn/wp-content/uploads/2019/07/12.-300x300.jpg"
                                            class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail lazy-load-active"
                                            alt=""
                                            srcset="https://khanomi.vn/wp-content/uploads/2019/07/12.-300x300.jpg 300w, https://khanomi.vn/wp-content/uploads/2019/07/12.-150x150.jpg 150w, https://khanomi.vn/wp-content/uploads/2019/07/12.-100x100.jpg 100w"
                                            data-srcset="https://khanomi.vn/wp-content/uploads/2019/07/12.-300x300.jpg 300w, https://khanomi.vn/wp-content/uploads/2019/07/12.-150x150.jpg 150w, https://khanomi.vn/wp-content/uploads/2019/07/12.-100x100.jpg 100w"
                                            sizes="(max-width: 300px) 100vw, 300px"> </a></div>
                                <div class="image-tools is-small top right show-on-hover"></div>
                                <div class="image-tools is-small hide-for-small bottom left show-on-hover"></div>
                                <div
                                    class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                                </div>
                            </div>
                            <div class="box-text box-text-products">
                                <div class="title-wrapper">
                                    <p class="name product-title"><a
                                            href="https://khanomi.vn/san-pham/khan-lanh-man-ghep-mau-8/">Khăn lạnh màng
                                            ghép – Mẫu 8</a></p>
                                </div>
                                <div class="price-wrapper"> <span class="price"><del><span
                                                class="woocommerce-Price-amount amount">500<span
                                                    class="woocommerce-Price-currencySymbol">₫</span></span></del>
                                        <ins><span class="woocommerce-Price-amount amount">400<span
                                                    class="woocommerce-Price-currencySymbol">₫</span></span></ins></span>
                                </div>
                                <div class="add-to-cart-button"><a href="?add-to-cart=1261" data-quantity="1"
                                        class="primary is-small mb-0 button product_type_simple add_to_cart_button ajax_add_to_cart is-flat"
                                        data-product_id="1261" data-product_sku=""
                                        aria-label="Thêm “Khăn lạnh màng ghép - Mẫu 8” vào giỏ hàng" rel="nofollow">Mua
                                        hàng</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection