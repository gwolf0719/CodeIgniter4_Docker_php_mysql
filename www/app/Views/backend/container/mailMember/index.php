<?= $this->extend('backend/layout'); ?>

<?= $this->section('container-fluid'); ?>

<div class="container-fluid" id="App" v-cloak>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header  card-header--2">

                    <div>
                        <h5>郵件清單</h5>
                    </div>

                    <!-- <form class="d-inline-flex">
                        <a href="javascript:void(0)" class="align-items-center btn btn-theme" v-on:click="add()">
                            <i data-feather="plus-square"></i>Add New
                        </a>
                    </form> -->

                </div>

                <div class="card-body">
                    <div>
                        <div class="table-responsive table-desi">
                            <table class="user-table table table-striped">
                                <thead>
                                    <tr>
                                        <th>email</th>
                                        <th>顯示名稱</th>
                                        <th>最後更新時間</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="item in list">

                                        <td>{{item.mail}}</td>
                                        <td>{{item.displayName}}</td>
                                        <td>{{item.lastDateTime}}</td>
                                        <td>
                                            <a href="javascript:void(0)" v-on:click="remove(item.mail)"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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





</div>
<!-- container-fluid 結束 -->
<?= $this->endSection(); ?>




<?= $this->section('lastScript'); ?>
<script>
    var App = {
        data() {
            return {
                list: [],

            }
        },
        created() {
            var _this = this;
            _this.getList();
        },
        mounted() {

        },

        methods: {
            save() {

                this.myModal.hide();
                var _this = this;
                axios({
                    method: "post",
                    url: "./ApiMailMember/SetOne",
                    data: Qs.stringify(_this.fromData)
                }).then(function(res) {
                    if (res.data.sys_code == '200') {
                        _this.getList();
                    } else {
                        alert('系統錯誤');
                    }
                })
            },


            getList() {
                var _this = this;
                axios({
                    method: "post",
                    url: "./ApiMailMember/List"
                }).then(function(res) {

                    _this.list = res.data.data
                    console.log(_this.list)
                });
            },


            remove(mail) { // 刪除資料
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
                            url: "./ApiMailMember/RemoveOne",
                            data: Qs.stringify({
                                mail: mail
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