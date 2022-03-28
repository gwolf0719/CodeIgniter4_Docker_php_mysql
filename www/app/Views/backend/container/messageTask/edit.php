<?= $this->extend('backend/layout'); ?>

<?= $this->section('container-fluid'); ?>

<div class="container-fluid" id="App" v-cloak>
    <div class="row">
        <div class="col-sm-12">
            <div class="card ">
                <div class="card-header  card-header--2">

                    <div>
                        <h5>編輯訊息組</h5>
                    </div>

                    <form class="d-inline-flex">
                        <a href="javascript:void(0)" class="align-items-center btn btn-theme" v-on:click="add()">
                            <i data-feather="plus-square"></i>Add New
                        </a>
                    </form>

                </div>

                <div class="card-body">
                    
                </div>
               
            </div>
        </div>

    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">區塊內容設定</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">樣式:</label>
                        <select name="" id=""  class="form-control" v-model="blockStyle">
                            <option value="">請選擇</option>
                            <option v-for="item in blockStyleList" :value="item.id">{{item.displayName}}</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <div v-if="blockStyle == 1">
                            <img v-for="item in imgList" :src="item.info" class="img-thumbnail col-sm-1" :alt="item.alt">
                        </div>
                        <div v-if="blockStyle == 2">BBB</div>
                    </div>
                    
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" v-on:click="save">Save changes</button>
                </div>
            </div>
        </div>
    </div>


</div>
<!-- container-fluid 結束 -->
<?= $this->endSection(); ?>




<?= $this->section('lastScript'); ?>
<script>
    
    var App = {
        data() {
            return {
                imgList:[],
                textList:[],
                blockStyleList: [
                    {
                        id:1,
                        displayName:'單一圖'
                    },
                    {
                        id:2,
                        displayName:'左右雙圖'
                    },
                    {
                        id:3,
                        displayName:'圖文'
                    },
                    {
                        id:4,
                        displayName:'文字連結'
                    },
                ],
                blockStyle:"",
                myModal:""
                
            }
        },
        created() {
            var _this = this;
            _this.getAssetsList();
        },
        mounted(){
            this.myModal = new bootstrap.Modal(document.getElementById('exampleModal'));
        },
        
        methods: {
            edit(AssetsId) {
                var _this = this;
                axios({
                    method: "post",
                    url: "./apiAssets/Once",
                    data: Qs.stringify({
                        assetsId: AssetsId
                    })
                }).then(function(res) {
                    _this.fromData = res.data.data
                    _this.fromData.action = 'edit';
                })
                
                this.myModal.show();
            },
            add() {
                var _this = this
                _this.fromData = {
                    action: "add",
                    assetsId: "",
                    assetsType: "",
                    targetUrl: "",
                    alt: "",
                    info: "",
                }
                
                
                this.myModal.show();
            },
            save() {
                
                this.myModal.hide();
                var _this = this;
                axios({
                    method: "post",
                    url: "./apiAssets/SetOne",
                    data: Qs.stringify(_this.fromData)
                }).then(function(res) {
                    
                    if (res.data.sys_code == '200') {
                        _this.getList();
                    } else {
                        alert('系統錯誤');
                    }
                })
            },


            displayName(assetsType) { // 轉換權限文字
                console.log(assetsType)
                var _this = this;
                assetsType = _this.assetsTypeList.filter(d => d.assetsType == assetsType)
                
                return assetsType[0].displayName
            },
            getAssetsList() {
                var _this = this;
                axios({
                    method: "post",
                    url: "./apiAssets/List"
                }).then(function(res) {
                    var list = res.data.data;
                    list.forEach(function(k,v){
                        // console.log(k['assetsType'])
                        
                        if(k['assetsType'] == 'img'){
                            console.log(k)
                            _this.imgList.push(k)
                            console.log( _this.imgList)
                        }
                        if(k['assetsType'] == 'text'){
                            _this.textList.push(k)
                        }
                    });
                });
                console.log(_this.imgList)
                // console.log(_this.textList)
            },


            remove(AssetsId) { // 刪除資料
                var _this = this
                // 彈出 sweetalert2
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // 傳送刪除資料
                        axios({
                            method: "post",
                            url: "./apiAssets/RemoveOne",
                            data: Qs.stringify({
                                assetsId: AssetsId
                            })
                        }).then(function(res) {
                            switch (res.data.sys_code) {
                                case '000':
                                    alert("資料填寫不完全");
                                    break;
                                case '200':
                                    _this.getList();
                                    break;
                            }
                        })

                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                })
            }
            // remove 結束
        },
        
    }
    Vue.createApp(App).mount("#App");
</script>
<?= $this->endSection(); ?>