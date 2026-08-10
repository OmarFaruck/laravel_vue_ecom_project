<template>


    <div class="container-fluid">
        <div class="card mt-4 py-4 container text-center justify-content-center">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="mb-3">
                    <label class="align-items-left">Search Name:</label>
                    <input v-model="searchValue" placeholder="Search by name..." subject="text" class="form-control" />
                </div>
                <h2>Product Page</h2>


                <button type="button" class="btn btn-outline-success" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    Add Product Page
                </button>


            </div>



            <Vue3EasyDataTable :headers="headers" :items="items" :rows-per-page="10" border-cell
                header-text-direction="center" body-text-direction="center" :search-field="searchField"
                :search-value="searchValue">
                <template #header-name="header">
                    <div class="customize-header">
                        <!-- <img src="../images/name.png" class="header-icon"> -->
                        {{ header.text }}
                    </div>
                </template>
                <template #header-address="header">
                    <div class="customize-header">
                        <!-- <img src="../images/address.png" class="header-icon"> -->
                        {{ header.text }}
                    </div>
                </template>

                <template #item-action="item">
                    <button @click="edit(item)" class="btn btn-sm btn-success me-2">
                        <SquarePen /> Edit
                    </button>
                    <button type="button" @click="remove(item)" class="btn btn-sm btn-danger">
                        <Trash2 /> Delete
                    </button>
                </template>

                <!-- <template #item-product_video="item">
                    <video controls width="200">
                        <source :src="'/storage/' + item.product_video" type="video/mp4">
                    </video>
                </template> -->

                <template #item-product_thumbnail="item">
                    <img :src="'/storage/' + item.product_thumbnail" width="80" height="60" class="rounded" />
                </template>

            </Vue3EasyDataTable>
        </div>


        <!-- input From Page -->
        <div class="modal fade" id="exampleModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form @submit.prevent="submitcreate">
                        <div class="modal-header">
                            <h5 class="modal-title">Product Create Form</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">

                            <div class="mb-3">
                                <label>Category</label>

                                <select v-model="form.category_id" class="form-control" name="category_id">
                                    <option value="">Select Category</option>
                                    <option v-for="category in categories" :key="category.id" :value="category.id">
                                        {{ category.id }} - {{ category.name }}
                                    </option>
                                </select>

                                <div class="text-danger" v-if="form.errors.category_id">
                                    {{ form.errors.category_id }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>subcategory_id:</label>
                                <select v-model="form.subcategory_id" class="form-control" name="subcategory_id">
                                    <option value="">Select Subcategory</option>
                                    <option v-for="subcategory in subcategories" :key="subcategory.id"
                                        :value="subcategory.id">
                                        {{ subcategory.id }} - {{ subcategory.name }}
                                    </option>
                                </select>
                                <div class="text-danger" v-if="form.errors.subcategory_id">
                                    {{ form.errors.subcategory_id }}
                                </div>
                            </div>


                            <div class="mb-3">
                                <label>brand_id:</label>
                                <select v-model="form.brand_id" class="form-control" name="brand_id">
                                    <option value="">Select Brand</option>
                                    <option v-for="brand in brands" :key="brand.id" :value="brand.id">
                                        {{ brand.id }} - {{ brand.name }}
                                    </option>
                                </select>
                                <div class="text-danger" v-if="form.errors.brand_id">
                                    {{ form.errors.brand_id }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>pickup_point_id:</label>
                                <select v-model="form.pickup_point_id" class="form-control" name="pickup_point_id">
                                    <option value="">Select Pickup Point</option>
                                    <option v-for="pickupPoint in pickupPoints" :key="pickupPoint.id"
                                        :value="pickupPoint.id">
                                        {{ pickupPoint.id }} - {{ pickupPoint.pickup_point_name }}
                                    </option>
                                </select>
                                <div class="text-danger" v-if="form.errors.pickup_point_id">
                                    {{ form.errors.pickup_point_id }}
                                </div>
                            </div>
 
                            <div class="mb-3">
                                <label>product_view:</label>
                                <input v-model="form.product_view" type="number" placeholder="Create product_view"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.product_view">
                                    {{ form.errors.product_view }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>product_weight:</label>
                                <input v-model="form.product_weight" type="number" placeholder="Create product_weight"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.product_weight">
                                    {{ form.errors.product_weight }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>product_name:</label>
                                <input v-model="form.product_name" type="text" placeholder="Create product_name"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.product_name">
                                    {{ form.errors.product_name }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>product_code:</label>
                                <input v-model="form.product_code" type="number" placeholder="Create product_code"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.product_code">
                                    {{ form.errors.product_code }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>product_tags:</label>
                                <input v-model="form.product_tags" type="number" placeholder="Create product_tags"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.product_tags">
                                    {{ form.errors.product_tags }}
                                </div>
                            </div>

                            <!-- <div class="mb-3">
                                <label>Product Video:</label>

                                <input type="file" accept="video/*"
                                    @change="form.product_video = $event.target.files[0]" class="form-control" />

                                <div class="text-danger" v-if="form.errors.product_video">
                                    {{ form.errors.product_video }}
                                </div>
                            </div> -->

                            <div class="mb-3">
                                <label>product_thumbnail:</label>
                                <input @change="form.product_thumbnail = $event.target.files[0]" type="file"
                                    accept="image/*" class="dropify form-control" />
                                <div class="text-danger" v-if="form.errors.product_thumbnail">
                                    {{ form.errors.product_thumbnail }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>product_heading:</label>
                                <input v-model="form.product_heading" type="text" placeholder="Create product_heading"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.product_heading">
                                    {{ form.errors.product_heading }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>product_description:</label>
                                <input v-model="form.product_description" type="text"
                                    placeholder="Create product_description" class="form-control" />
                                <div class="text-danger" v-if="form.errors.product_description">
                                    {{ form.errors.product_description }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>product_warranty:</label>
                                <input v-model="form.product_warranty" type="number"
                                    placeholder="Create product_warranty" class="form-control" />
                                <div class="text-danger" v-if="form.errors.product_warranty">
                                    {{ form.errors.product_warranty }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>product_warranty_duration:</label>
                                <input v-model="form.product_warranty_duration" type="number"
                                    placeholder="Create product_warranty_duration" class="form-control" />
                                <div class="text-danger" v-if="form.errors.product_warranty_duration">
                                    {{ form.errors.product_warranty_duration }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>product_warranty_conditions:</label>
                                <input v-model="form.product_warranty_conditions" type="text"
                                    placeholder="Create product_warranty_conditions" class="form-control" />
                                <div class="text-danger" v-if="form.errors.product_warranty_conditions">
                                    {{ form.errors.product_warranty_conditions }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>product_return_policy:</label>
                                <input v-model="form.product_return_policy" type="text"
                                    placeholder="Create product_return_policy" class="form-control" />
                                <div class="text-danger" v-if="form.errors.product_return_policy">
                                    {{ form.errors.product_return_policy }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>product_purchase_price:</label>
                                <input v-model="form.product_purchase_price" type="number"
                                    placeholder="Create product_purchase_price" class="form-control" />
                                <div class="text-danger" v-if="form.errors.product_purchase_price">
                                    {{ form.errors.product_purchase_price }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>product_selling_price:</label>
                                <input v-model="form.product_selling_price" type="number"
                                    placeholder="Create product_selling_price" class="form-control" />
                                <div class="text-danger" v-if="form.errors.product_selling_price">
                                    {{ form.errors.product_selling_price }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>warehouse:</label>
                                <select v-model="form.warehouse" class="form-control" name="warehouse">
                                    <option value="">Select Warehouse</option>
                                    <option v-for="warehouse in warehouses" :key="warehouse.id" :value="warehouse.id">
                                        {{ warehouse.id }} - {{ warehouse.warehouse_name }}
                                    </option>
                                </select>
                                <div class="text-danger" v-if="form.errors.warehouse">
                                    {{ form.errors.warehouse }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>featured:</label>
                                <input v-model="form.featured" type="number" placeholder="Create featured"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.featured">
                                    {{ form.errors.featured }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>today_deal:</label>
                                <input v-model="form.today_deal" type="number" placeholder="Create today_deal"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.today_deal">
                                    {{ form.errors.today_deal }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>trendy_product:</label>
                                <select v-model="form.trendy_product" class="form-control" name="trendy_product">
                                    <option value="">Select Trendy Product</option>
                                    <option v-for="trendy_product in trendyProducts" :key="trendy_product.id"
                                        :value="trendy_product.id">
                                        {{ trendy_product.id }} - {{ trendy_product.title }}
                                    </option>
                                </select>
                                <div class="text-danger" v-if="form.errors.trendy_product">
                                    {{ form.errors.trendy_product }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>product_color:</label>
                                <select v-model="form.product_color" class="form-control" name="product_color">
                                    <option value="">Select product_color</option>
                                    <option v-for="product_color in product_color" :key="product_color.product_color"
                                        :value="product_color.product_color">
                                        {{ product_color.product_color }}
                                        <!-- {{ product_color.id }} - {{ product_color.product_color }} -->
                                    </option>
                                </select>
                                <div class="text-danger" v-if="form.errors.product_color">
                                    {{ form.errors.product_color }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>product_size:</label>
                                <select v-model="form.product_size" class="form-control" name="product_size">
                                    <option value="">Select product_size</option>
                                    <option v-for="product_size in product_size" :key="product_size.product_size"
                                        :value="product_size.product_size">
                                         {{ product_size.product_size }}
                                    </option>
                                </select>
                                <div class="text-danger" v-if="form.errors.product_size">
                                    {{ form.errors.product_size }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>product_quantity:</label>
                                <select v-model="form.product_quantity" class="form-control" name="product_quantity">
                                    <option value="">Select product_quantity</option>
                                    <option v-for="product_quantity in product_quantity" :key="product_quantity.id"
                                        :value="product_quantity.id">
                                         {{ product_quantity.product_quantity }}
                                    </option>
                                </select>
                                <div class="text-danger" v-if="form.errors.product_quantity">
                                    {{ form.errors.product_quantity }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="coupon_subject">product_status</label>

                                <select id="coupon_subject" class="form-control" v-model="form.product_status" required>
                                    <option value="active">active</option>
                                    <option value="inactive">inactive</option>
                                </select>
                                <div class="text-danger" v-if="form.errors.product_status">
                                    {{ form.errors.product_status }}
                                </div>
                            </div>


                            <div class="mb-3">
                                <label>user_id:</label>
                                <select v-model="form.user_id" class="form-control" name="user_id">
                                    <option>Select User</option>
                                    <option v-for="user in users" :key="user.id" :value="user.id">
                                        {{ user.id }} - {{ user.name }}
                                    </option>
                                </select>
                                <div class="text-danger" v-if="form.errors.user_id">
                                    {{ form.errors.user_id }}
                                </div>
                            </div>

                             <div class="mb-3">
                                <label>slug:</label>
                                <input v-model="form.slug" type="text"
                                    placeholder="Create slug" class="form-control" />
                                <div class="text-danger" v-if="form.errors.slug">
                                    {{ form.errors.slug }}
                                </div>
                            </div>


                        </div>

                        <div class="modal-footer">
                            <button class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <!-- input Edit From Page -->
        <div class="modal fade" id="editModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form @submit.prevent="submitUpdate">
                        <div class="modal-header">
                            <h5 class="modal-title">Product Edit Form</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">

                            <div class="mb-3">
                                <label>Category</label>

                                <select v-model="form.category_id" class="form-control" name="category_id">
                                    <option value="">Select Category</option>
                                    <option v-for="category in categories" :key="category.id" :value="category.id">
                                        {{ category.id }} - {{ category.name }}
                                    </option>
                                </select>

                                <div class="text-danger" v-if="form.errors.category_id">
                                    {{ form.errors.category_id }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>subcategory_id:</label>
                                <select v-model="form.subcategory_id" class="form-control" name="subcategory_id">
                                    <option value="">Select Subcategory</option>
                                    <option v-for="subcategory in subcategories" :key="subcategory.id"
                                        :value="subcategory.id">
                                        {{ subcategory.id }} - {{ subcategory.name }}
                                    </option>
                                </select>
                                <div class="text-danger" v-if="form.errors.subcategory_id">
                                    {{ form.errors.subcategory_id }}
                                </div>
                            </div>


                            <div class="mb-3">
                                <label>brand_id:</label>
                                <select v-model="form.brand_id" class="form-control" name="brand_id">
                                    <option value="">Select Brand</option>
                                    <option v-for="brand in brands" :key="brand.id" :value="brand.id">
                                        {{ brand.id }} - {{ brand.name }}
                                    </option>
                                </select>
                                <div class="text-danger" v-if="form.errors.brand_id">
                                    {{ form.errors.brand_id }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>pickup_point_id:</label>
                                <select v-model="form.pickup_point_id" class="form-control" name="pickup_point_id">
                                    <option value="">Select Pickup Point</option>
                                    <option v-for="pickupPoint in pickupPoints" :key="pickupPoint.id"
                                        :value="pickupPoint.id">
                                        {{ pickupPoint.id }} - {{ pickupPoint.pickup_point_name }}
                                    </option>
                                </select>
                                <div class="text-danger" v-if="form.errors.pickup_point_id">
                                    {{ form.errors.pickup_point_id }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>product_view:</label>
                                <input v-model="form.product_view" type="number" placeholder="Create product_view"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.product_view">
                                    {{ form.errors.product_view }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>product_weight:</label>
                                <input v-model="form.product_weight" type="number" placeholder="Create product_weight"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.product_weight">
                                    {{ form.errors.product_weight }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>product_name:</label>
                                <input v-model="form.product_name" type="text" placeholder="Create product_name"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.product_name">
                                    {{ form.errors.product_name }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>product_code:</label>
                                <input v-model="form.product_code" type="number" placeholder="Create product_code"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.product_code">
                                    {{ form.errors.product_code }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>product_tags:</label>
                                <input v-model="form.product_tags" type="number" placeholder="Create product_tags"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.product_tags">
                                    {{ form.errors.product_tags }}
                                </div>
                            </div>

                            <!-- <div class="mb-3">
                                <label>Product Video:</label>

                                <input type="file" accept="video/*"
                                    @change="form.product_video = $event.target.files[0]" class="form-control" />

                                <div class="text-danger" v-if="form.errors.product_video">
                                    {{ form.errors.product_video }}
                                </div>
                            </div> -->

                            <div class="mb-3">
                                <label>product_thumbnail:</label>
                                <input @change="form.product_thumbnail = $event.target.files[0]" type="file"
                                    accept="image/*" class="dropify form-control" />
                                <div class="text-danger" v-if="form.errors.product_thumbnail">
                                    {{ form.errors.product_thumbnail }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>product_heading:</label>
                                <input v-model="form.product_heading" type="text" placeholder="Create product_heading"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.product_heading">
                                    {{ form.errors.product_heading }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>product_description:</label>
                                <input v-model="form.product_description" type="text"
                                    placeholder="Create product_description" class="form-control" />
                                <div class="text-danger" v-if="form.errors.product_description">
                                    {{ form.errors.product_description }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>product_warranty:</label>
                                <input v-model="form.product_warranty" type="number"
                                    placeholder="Create product_warranty" class="form-control" />
                                <div class="text-danger" v-if="form.errors.product_warranty">
                                    {{ form.errors.product_warranty }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>product_warranty_duration:</label>
                                <input v-model="form.product_warranty_duration" type="number"
                                    placeholder="Create product_warranty_duration" class="form-control" />
                                <div class="text-danger" v-if="form.errors.product_warranty_duration">
                                    {{ form.errors.product_warranty_duration }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>product_warranty_conditions:</label>
                                <input v-model="form.product_warranty_conditions" type="text"
                                    placeholder="Create product_warranty_conditions" class="form-control" />
                                <div class="text-danger" v-if="form.errors.product_warranty_conditions">
                                    {{ form.errors.product_warranty_conditions }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>product_return_policy:</label>
                                <input v-model="form.product_return_policy" type="text"
                                    placeholder="Create product_return_policy" class="form-control" />
                                <div class="text-danger" v-if="form.errors.product_return_policy">
                                    {{ form.errors.product_return_policy }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>product_purchase_price:</label>
                                <input v-model="form.product_purchase_price" type="number"
                                    placeholder="Create product_purchase_price" class="form-control" />
                                <div class="text-danger" v-if="form.errors.product_purchase_price">
                                    {{ form.errors.product_purchase_price }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>product_selling_price:</label>
                                <input v-model="form.product_selling_price" type="number"
                                    placeholder="Create product_selling_price" class="form-control" />
                                <div class="text-danger" v-if="form.errors.product_selling_price">
                                    {{ form.errors.product_selling_price }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>warehouse:</label>
                                <select v-model="form.warehouse" class="form-control" name="warehouse">
                                    <option value="">Select Warehouse</option>
                                    <option v-for="warehouse in warehouses" :key="warehouse.id" :value="warehouse.id">
                                        {{ warehouse.id }} - {{ warehouse.warehouse_name }}
                                    </option>
                                </select>
                                <div class="text-danger" v-if="form.errors.warehouse">
                                    {{ form.errors.warehouse }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>featured:</label>
                                <input v-model="form.featured" type="number" placeholder="Create featured"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.featured">
                                    {{ form.errors.featured }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>today_deal:</label>
                                <input v-model="form.today_deal" type="number" placeholder="Create today_deal"
                                    class="form-control" />
                                <div class="text-danger" v-if="form.errors.today_deal">
                                    {{ form.errors.today_deal }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>trendy_product:</label>
                                <select v-model="form.trendy_product" class="form-control" name="trendy_product">
                                    <option value="">Select Trendy Product</option>
                                    <option v-for="trendy_product in trendyProducts" :key="trendy_product.id"
                                        :value="trendy_product.id">
                                        {{ trendy_product.id }} - {{ trendy_product.title }}
                                    </option>
                                </select>
                                <div class="text-danger" v-if="form.errors.trendy_product">
                                    {{ form.errors.trendy_product }}
                                </div>
                            </div>

                               <div class="mb-3">
                                <label>product_color:</label>
                                <select v-model="form.product_color" class="form-control" name="product_color">
                                    <option value="">Select product_color</option>
                                    <option v-for="product_color in product_color" :key="product_color.product_color"
                                        :value="product_color.product_color">
                                         {{ product_color.product_color }}
                                        <!-- {{ product_color.id }} - {{ product_color.product_color }} -->
                                    </option>
                                </select>
                                <div class="text-danger" v-if="form.errors.product_color">
                                    {{ form.errors.product_color }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>product_size:</label>
                                <select v-model="form.product_size" class="form-control" name="product_size">
                                    <option value="">Select product_size</option>
                                    <option v-for="product_size in product_size" :key="product_size.product_size"
                                        :value="product_size.product_size">
                                         {{ product_size.product_size }}
                                    </option>
                                </select>
                                <div class="text-danger" v-if="form.errors.product_size">
                                    {{ form.errors.product_size }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>product_quantity:</label>
                                <select v-model="form.product_quantity" class="form-control" name="product_quantity">
                                    <option value="">Select product_quantity</option>
                                    <option v-for="product_quantity in product_quantity" :key="product_quantity.id"
                                        :value="product_quantity.id">
                                         {{ product_quantity.product_quantity }}
                                    </option>
                                </select>
                                <div class="text-danger" v-if="form.errors.product_quantity">
                                    {{ form.errors.product_quantity }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="coupon_subject">product_status</label>

                                <select id="coupon_subject" class="form-control" v-model="form.product_status" required>
                                    <option value="active">active</option>
                                    <option value="inactive">inactive</option>
                                </select>
                                <div class="text-danger" v-if="form.errors.product_status">
                                    {{ form.errors.product_status }}
                                </div>
                            </div>


                            <div class="mb-3">
                                <label>user_id:</label>
                                <select v-model="form.user_id" class="form-control" name="user_id">
                                    <option>Select User</option>
                                    <option v-for="user in users" :key="user.id" :value="user.id">
                                        {{ user.id }} - {{ user.name }}
                                    </option>
                                </select>
                                <div class="text-danger" v-if="form.errors.user_id">
                                    {{ form.errors.user_id }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>slug:</label>
                                <input v-model="form.slug" type="text"
                                    placeholder="Create slug" class="form-control" />
                                <div class="text-danger" v-if="form.errors.slug">
                                    {{ form.errors.slug }}
                                </div>
                            </div>


                        </div>

                        <div class="modal-footer">
                            <button class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>



    </div>
</template>

<script setup>
import { usePage, useForm, router } from "@inertiajs/vue3";
import { Modal } from "bootstrap";
import { SquarePen, Trash2 } from '@lucide/vue';
import Vue3EasyDataTable from 'vue3-easy-data-table';
import 'vue3-easy-data-table/dist/style.css';
// import 'vue3-easy-data-table';
import 'bootstrap/dist/js/bootstrap.bundle.min.js';
import { computed, ref } from "vue";

const searchField = ["id", "category_id", "subcategory_id", "brand_id", "pickup_point_id", "product_view", "product_weight", "product_name", "product_code", "product_tags","product_thumbnail", "product_heading", "product_description", "product_warranty", "product_warranty_duration", "product_warranty_conditions", "product_return_policy", "product_purchase_price", "product_selling_price", "warehouse", "featured", "today_deal", "trendy_product","product_color","product_size", "product_quantity","product_status", "user_id","slug"// "product_video"
];
const searchValue = ref();

const page = usePage();



const items = computed(() => page.props.ProductPage || []);
const headers = [
    { text: "ID", value: "id" },
    { text: "category_id", value: "category_id" },
    { text: "subcategory_id", value: "subcategory_id" },
    { text: "brand_id", value: "brand_id" },
    { text: "pickup_point_id", value: "pickup_point_id" }, 
    { text: "product_view", value: "product_view" },
    { text: "product_weight", value: "product_weight" },
    { text: "product_name", value: "product_name" },
    { text: "product_code", value: "product_code" },
    { text: "product_tags", value: "product_tags" },
    // { text: "product_video", value: "product_video" },
    { text: "product_thumbnail", value: "product_thumbnail" },
    { text: "product_heading", value: "product_heading" },
    { text: "product_description", value: "product_description" },
    { text: "product_warranty", value: "product_warranty" },
    { text: "product_warranty_duration", value: "product_warranty_duration" },
    { text: "product_warranty_conditions", value: "product_warranty_conditions" },
    { text: "product_return_policy", value: "product_return_policy" },
    { text: "product_purchase_price", value: "product_purchase_price" },
    { text: "product_selling_price", value: "product_selling_price" },
    { text: "warehouse", value: "warehouse" },
    { text: "featured", value: "featured" },
    { text: "today_deal", value: "today_deal" },
    { text: "trendy_product", value: "trendy_product" },
    { text: "product_color", value: "product_color" },
    { text: "product_size", value: "product_size" },
    { text: "product_quantity", value: "product_quantity" },
    { text: "product_status", value: "product_status" },
    { text: "user_id", value: "user_id" },
    { text: "slug", value: "slug" },
    { text: "Action", value: "action" },

];
const form = useForm({
    id: null,
    category_id: "",
    subcategory_id: "",
    brand_id: "",
    pickup_point_id: "", 
    product_view: "",
    product_weight: "",
    product_name: "",
    product_code: "",
    product_tags: "",
    // product_video: null,
    product_thumbnail: null,
    product_heading: "",
    product_description: "",
    product_warranty: "",
    product_warranty_duration: "",
    product_warranty_conditions: "",
    product_return_policy: "",
    product_purchase_price: "",
    product_selling_price: "",
    warehouse: "",
    featured: "",
    today_deal: "",
    trendy_product: "",
    product_color: "",
    product_size: "",
    product_quantity: "",
    product_status: "",
    user_id: "",
    slug: "",
});

const props = defineProps({
    ProductPage: Array,
    categories: Array,
    subcategories: Array,
    brands: Array,
    pickupPoints: Array,
    warehouses: Array,
    trendyProducts: Array,
    users: Array,
    product_color: Array,
    product_size: Array,
    product_quantity: Array,
});

const submitcreate = () => {
    form.post("/admin/ProductPage", {
        onSuccess: () => {
            // Form এর সব input ফাঁকা করে দেয়
            form.reset();


            //   HTML এর এই modal টা ধরছে:
            const modalEl = document.getElementById("exampleModal");
            if (modalEl) {
                const modal = Modal.getInstance(modalEl) || new Modal(modalEl);

                // Modal বন্ধ করা
                modal.hide();
            }

            // 🔥 Force remove modal overlay + body lock
            document.body.classList.remove("modal-open");
            document
                .querySelectorAll(".modal-backdrop")
                .forEach((el) => el.remove());
        },
    });

    swal("Good job!", "This ProductPage will be added", "success");
};



function edit(item) {
    form.id = item.id;
    form.category_id = item.category_id;
    form.subcategory_id = item.subcategory_id;
    form.brand_id = item.brand_id;
    form.pickup_point_id = item.pickup_point_id; 
    form.product_view = item.product_view;
    form.product_weight = item.product_weight;
    form.product_name = item.product_name;
    form.product_code = item.product_code;
    form.product_tags = item.product_tags;
    // form.product_video = item.product_video;
    form.product_thumbnail = item.product_thumbnail;
    form.product_heading = item.product_heading;
    form.product_description = item.product_description;
    form.product_warranty = item.product_warranty;
    form.product_warranty_duration = item.product_warranty_duration;
    form.product_warranty_conditions = item.product_warranty_conditions;
    form.product_return_policy = item.product_return_policy;
    form.product_purchase_price = item.product_purchase_price;
    form.product_selling_price = item.product_selling_price;
    form.warehouse = item.warehouse;
    form.featured = item.featured;
    form.today_deal = item.today_deal;
    form.trendy_product = item.trendy_product;
    form.product_color = item.product_color;
    form.product_size = item.product_size;
    form.product_quantity = item.product_quantity;
    form.product_status = item.product_status;
    form.user_id = item.user_id;
    form.slug = item.slug;
    const modalEl = document.getElementById("editModal");
    if (modalEl) {
        const modal = new Modal(modalEl);
        modal.show();
    }
}

function submitUpdate() {

    const ModelEI = document.getElementById("editModal");
    if (ModelEI) {
        const editModal = Modal.getInstance(ModelEI);
        if (editModal) {
            editModal.hide();
        }
    }

    form.transform((data) => ({
        ...data,
        _method: "put",
    }))

        .post(`/admin/ProductPage/${form.id}`, {
            forceFormData: true,
            onFinish: () => {
                form.reset();
                // 🔥 Force remove modal overlay + body lock
                document.body.classList.remove("modal-open");
                document
                    .querySelectorAll(".modal-backdrop")
                    .forEach((el) => el.remove());

            }


        });

    swal("Good job!", "This ProductPage will be updated", "success");
}

function remove(data) {

    swal({
        title: "Are you sure?",
        text: "This ProductPage will be deleted!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {

        if (willDelete) {

            router.delete(`/admin/ProductPage/${data.id}`, {
                onSuccess: () => {
                    swal("Deleted successfully!", {
                        icon: "success",
                    });
                }
            });

        }

    });
}
</script>

<style>
.customize-header {
    display: flex;
    justify-items: center;
    align-items: center;
}

.header-icon {
    display: inline-block;
    width: 20px;
    height: 20px;
}

.customize-table {
    --easy-table-header-font-size: 24px;
}
</style>