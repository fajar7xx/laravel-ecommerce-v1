<template>
    <div>
        <div class="card">
            <div class="card-header">
                <h3 class="d-block w-100">Attributes</h3>
            </div>
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="parent">Select an Attribute <span class="text-danger">*</span></label>
                        <select name="" id="parent" class="form-control custom-select mt-15" v-model="attribute" @change="selectAttribute(attribute)">
                            <option :value="attribute" v-for="attribute in attributes">{{ attribute.name }}</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="card" v-if="attributeSelected">
            <div class="card-header">
                <h3 class="d-block w-100">Add Attribute to Product</h3>
            </div>
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="values">Select an value <span class="text-danger">*</span></label>
                        <select name="" id="values" class="form-control custom-select" v-model="value" @change="selectValue(value)">
                            <option :value="value" v-for="value in attributeValues">{{ value.value }}</option>
                        </select>
                    </div>
                </div>
                <div class="form-row" v-if="valueSelected">
                    <div class="form-group col-md-6">
                        <label for="quantity">Quantity</label>
                        <input type="number" min="0" class="form-control" id="quantity" v-model="currentQty">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="price">Price</label>
                        <input type="text" class="form-control" id="price" v-model="currentPrice">
                        <small class="text-danger">this price will be added to the main price of product frontend.</small>
                    </div>
                    <div class="form-grou">
                        <button class="btn btn-sm btn-primary" @click="addProductAttribute()">
                            Add
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h3 class="d-block w-100">Product Attributes</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead>
                            <tr class="text-center">
                                <th>Value</th>
                                <th>Qty</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="pa in productAttributes">
                                <td width="25%" class="text-center">{{ pa.value }}</td>
                                <td width="25%" class="text-center">{{ pa.quantity }}</td>
                                <td width="25%" class="text-center">{{ pa.price }}</td>
                                <td width="25%" class="text-center">
                                    <button class="btn btn-sm btn-danger" @click="deleteProductAttribute(pa)">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "product-attributes",
    props: ['productid'],
    data(){
        return{
            productAttributes: [],
            attributes: [],
            attribute: {},
            attributeSelected: false,
            attributeValues: [],
            value: {},
            valueSelected: false,
            currentAttributeId: '',
            currentValue: '',
            currentQty: '',
            currentPrice: '',
        }
    },
    created: function(){
        this.loadAttributes()
        this.loadProductAttributes(this.productid)
    },
    methods:{
        loadProductAttributes(id){
            let _this = this
            axios.post('/admin/products/attributes', {
                id: id
            }).then(function(response){
                _this.productAttributes = response.data
            }).catch(function(error){
                console.log(error)
            })
        },
        loadAttributes(){
            let _this = this
            axios.get('/admin/products/attributes/load').then(function(response){
                _this.attributes = response.data
            }).catch(function(error){
                console.log(error)
            })
        },
        selectAttribute(attribute){
            let _this = this
            this.currentAttributeId = attribute.id
            axios.post('/admin/products/attributes/values', {
                id: attribute.id
            }).then(function(response){
                _this.attributeValues = response.data
            }).catch(function(error){
                console.log(error)
            })
            this.attributeSelected = true
        },
        selectValue(value){
            this.valueSelected = true
            this.currentValue = value.value
            this.currentQty = value.quantity
            this.currentPrice = value.price
        },
        addProductAttribute(){
            if(this.currentQty === null || this.currentPrice === null){
                this.$swal('Error, some values are missing.', {
                    icon: "error",
                })
            }else{
                let _this = this
                let data = {
                    attribute_id : this.currentAttributeId,
                    value: this.currentValue,
                    quantity: this.currentQty,
                    price: this.currentPrice,
                    product_id: this.productid,
                }

                axios.post('/admin/products/attributes/add', {
                    data: data
                }).then(function(response){
                    _this.$swal("Success! " + response.data.message, {
                        icon: "success",
                    })
                    _this.currentValue = ''
                    _this.currentQty = ''
                    _this.currentPrice = ''
                    _this.valueSelected = false
                }).catch(function(error){
                    console.log(error)
                })
                this.loadProductAttributes(this.productid)
            }
        },
        deleteProductAttribute(pa){
            let _this = this
            this.$swal({
                title: "are you sure?",
                text: "Once deleted, you will not be able to recover this data!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if(willDelete){
                    console.log(pa.id)
                    axios.post('/admin/products/attributes/delete', {
                        id: pa.id,
                    }).then(function(response){
                        if(response.data.status === 'success'){
                            _this.$swal("Success! Product attribute has been deleted!",{
                                icon: "success",
                            });
                            _this.loadProductAttributes(_this.productid);
                        }else{
                            _this.$swal("your product attribute not deleted!")
                        }
                    }).catch(function(error){
                        console.log(error)
                    })
                }else{
                    this.$swal("Action canceled!")
                }
            })
        }
    }
}
</script>