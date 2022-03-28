<?= $this->extend('backend/layout'); ?>

<?= $this->section('container-fluid'); ?>

<div class="container-fluid" id="App" v-cloak>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header  card-header--2">

                    <div>
                        <h5>素材清單</h5>
                    </div>

                    <form class="d-inline-flex">
                        <a href="javascript:void(0)" class="align-items-center btn btn-theme" v-on:click="add()">
                            <i data-feather="plus-square"></i>Add New
                        </a>
                    </form>

                </div>

                <div class="card-body">
                    <div>
                        <div class="table-responsive table-desi">
                            <table class="user-table table table-striped">
                                <thead>
                                    <tr>
                                        <th>素材類型</th>
                                        <th>內容</th>
                                        <th>連結對象</th>
                                        <th>最後更新時間</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="item in list">
                                        <td>{{displayName(item.assetsType) }}</td>
                                        <td v-if="item.assetsType == 'img'"><img :src="item.info" style="width:50px;" :alt="item.alt"></td>
                                        <td v-else>{{item.info}}</td>
                                        <td>{{item.targetUrl}}</td>
                                        <td>{{item.lastDateTime}}</td>
                                        <td>
                                            <a href="javascript:void(0)" v-on:click="edit(item.assetsId)"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                            ｜
                                            <a href="javascript:void(0)" v-on:click="remove(item.assetsId)"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- <div class=" pagination-box">
                    <nav class="ms-auto me-auto " aria-label="...">
                        <ul class="pagination pagination-primary">
                            <li class="page-item disabled"><a class="page-link" href="javascript:void(0)" tabindex="-1">Previous</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="javascript:void(0)">1</a></li>
                            <li class="page-item active"><a class="page-link" href="javascript:void(0)">2 <span class="sr-only">(current)</span></a></li>
                            <li class="page-item"><a class="page-link" href="javascript:void(0)">3</a></li>
                            <li class="page-item"><a class="page-link" href="javascript:void(0)">Next</a></li>
                        </ul>
                    </nav>
                </div> -->
            </div>
        </div>

    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">素材資料設定</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">素材類型:</label>
                        <select name="" id="" v-model="fromData.assetsType" class="form-control">
                            <option value="">請選擇</option>
                            <option v-for="item in assetsTypeList" :value="item.assetsType">{{item.displayName}}</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">替代文字:</label>
                        <input type="text" class="form-control" id="recipient-name" v-model="fromData.alt">
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">素材內容:</label>
                        <input type="text" class="form-control" id="recipient-name" v-model="fromData.info">
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">連結對象:</label>
                        <input type="text" class="form-control" id="recipient-name" v-model="fromData.targetUrl">
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
                list: [],
                assetsTypeList: [{
                    assetsType: 'img',
                    displayName: "圖片"
                }, {
                    assetsType: 'text',
                    displayName: "文字標題"
                }],
                fromData: {
                    action: "add",
                    assetsId: "",
                    assetsType: "",
                    targetUrl: "",
                    alt: "",
                    info: "",
                },
                myModal:""
                
            }
        },
        created() {
            var _this = this;
            _this.getList();
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
            getList() {
                var _this = this;
                axios({
                    method: "post",
                    url: "./apiAssets/List"
                }).then(function(res) {
                    
                    _this.list = res.data.data
                    console.log(_this.list)
                });
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