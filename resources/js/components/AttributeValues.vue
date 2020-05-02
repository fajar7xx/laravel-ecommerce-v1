<template>
    <div>
         <div class="card">
            <div class="card-header">
                <h3 class="d-block w-100">Attribute Values</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="value">Value</label>
                    <input 
                        type="text" 
                        class="form-control" 
                        name="value" 
                        id="value" 
                        placeholder="Enter Attribute value" 
                        v-model="value">
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input 
                        type="number" 
                        min="0" 
                        class="form-control" 
                        name="price" 
                        id="price"
                        v-model="price"
                        placeholder="Enter attribute value price"
                        >
                </div>
                <div class="form-group">
                    <button class="btn btn-success" type="submit" @click.stop="saveValue()" v-if="addValue">Save</button>
                    <button class="btn btn-success" type="submit" @click.stop="updateValue()" v-if="!addValue">Update</button>
                    <button class="btn btn-primary" type="submit" @click.stop="reset()" v-if="!addValue">Reset</button>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h3 class="d-block w-100">Option Values</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover" width="100%">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Value</th>
                            <th class="text-center">Price</th>
                            <th style="width: 100px; min-width:100px;" class="text-center text-danger"> <i class="ik ik-alert-circle"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="value in values">
                            <td style="width: 25%" class="text-center">{{ value.id }}</td>
                            <td style="width: 25%" class="text-center">{{ value.value }}</td>
                            <td style="width: 25%" class="text-center">{{ value.price }}</td>
                            <td style="width: 25%" class="text-center">
                                <button class="btn btn-sm btn-primary" @click.stop="editAttributeValue(value)">Edit</button>
                                <button class="btn btn-sm btn-danger" @click.stop="deleteAttributeValue(value)">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>
</template>

<script>
export default {
    name: "attribute-values",
    props: ['attributeid'],
    mounted(){
        console.log('component mounted')
    },
    data(){
        return{
            values: [],
            value: '',
            price: '',
            currentId: '',
            addValue: true,
            key: 0,
        }
    },
    created: function(){
        this.loadValues()
    },
    methods: {
        loadValues(){
            let attributeId = this.attributeid;
            let _this = this;
            axios.post('/admin/get-values', {
                id: attributeId
            }).then(function(response){
                _this.values = response.data
            }).catch(function(error){
                console.log(error)
            });
        },
        saveValue(){
            if(this.value === ''){
                this.$swal("Error", "Value for attribute is required.", {
                    icon: "error",
                });
            }else{
                let attributeId = this.attributeid;
                let _this = this;
                axios.post('/admin/add-values', {
                    id: attributeId,
                    value: _this.value,
                    price : _this.price,
                }).then(function(response){
                    _this.values.push(response.data);
                    _this.resetValue();
                    _this.$swal("Success! Value aded successfully!.",{
                        icon: "success",
                    });
                }).catch(function(error){
                    console.log(error);
                });
            }
        },
        resetValue(){
            this.value = '';
            this.price = '';
        },
        reset(){
            this.addValue = true;
            this.resetValue();
        },
        editAttributeValue(value){
            this.addValue = false
            this.value = value.value
            this.price = value.price
            this.currentId = value.id
            this.key = this.values.indexOf(value)
        },
        updateValue(){
             if(this.value === ''){
                this.$swal("Error", "Value for attribute is required.", {
                    icon: "error",
                });
             }else{
                 let attributeId = this.attributeid
                 let _this = this
                 axios.post('/admin/update-values', {
                     id: attributeId,
                     value: _this.value,
                     price: _this.price,
                     valueId: _this.currentId
                 }).then(function(response){
                     _this.values.splice(_this.key, 1)
                     _this.resetValue()
                     _this.values.push(response.data)
                     _this.$swal("Success! Value updated successfully", {
                         icon: "success",
                     });
                 }).catch(function(error){
                     console.log(error)
                 })
             }
        },
        deleteAttributeValue(value){
            this.$swal({
                title: "Are you sure?",
                text: "Once deleted, you will not able to recover this attribute value!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete)=>{
                if(willDelete){
                    this.currentId = value.id
                    this.key = this.values.indexOf(value)
                    let _this = this
                    axios.post('/admin/delete-values',{
                        id: _this.currentId
                    }).then(function(response){
                        if(response.data.status === 'success'){
                            _this.values.splice(_this.key, 1)
                            _this.resetValue()
                            _this.$swal("Success! Option value has been dleted!",{
                                icon: "success",
                            });
                        }else{
                            _this.$swal("your option value not deleted")
                        }
                    }).catch(function(error){
                        console.error();
                    })
                }else{
                    this.$swal("Your option value not deleted!")
                }
            });
        },
    }
}
</script>