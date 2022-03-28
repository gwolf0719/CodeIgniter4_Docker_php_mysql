
<!DOCTYPE html>
<html lang="en">
<?= view("/backend/template/head");?>

<body>
    <!-- login page start-->
    <div class="container-fluid p-0">
        <div class="row m-0">
            <div class="col-12 p-0">
                <div class="login-card">
                    <div>
                        <div ><h3>Myfans Message System</h3></div>
                        <div class="login-main" id="login-main">
                            <form class="theme-form">
                                <!-- <h4>Sign in to account</h4> -->
                                <!-- <p>Enter your email & password to login</p> -->
                                <div class="form-group">
                                    <label class="col-form-label form-label-title ">管理員帳號</label>
                                    <input class="form-control" type="text" required="" placeholder="請輸入帳號" v-model="managerId">
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label form-label-title ">管理員密碼</label>
                                    <div class="form-input position-relative">
                                        <input class="form-control" type="password"  required=""
                                            placeholder="請輸入密碼"  v-model="managerPwd">
                                        
                                    </div>
                                </div>
                                <div class="form-group mb-0">
                                    
                                    <div class="text-end mt-3">
                                        <button class="btn btn-primary btn-block w-100" type="button" v-on:click="login"  v-on:keyup.enter="login">Sign in</button>
                                    </div>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- latest jquery-->
        <script src="./assets/js/jquery-3.5.1.min.js"></script>
        <!-- Bootstrap js-->
        <script src="./assets/js/bootstrap/bootstrap.bundle.min.js"></script>
        <!-- feather icon js-->
        <script src="./assets/js/icons/feather-icon/feather.min.js"></script>
        <script src="./assets/js/icons/feather-icon/feather-icon.js"></script>
        <!-- scrollbar js-->
        <!-- Sidebar jquery-->
        <script src="./assets/js/config.js"></script>
        <!-- Plugins JS start-->
        <!-- Plugins JS Ends-->
        <!-- Theme js-->
        <script src="./assets/js/script.js"></script>
        <!-- login js-->
        <!-- Plugin used-->
        <!-- vue js -->
        <script src="https://unpkg.com/vue@next"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/qs/6.10.3/qs.min.js" integrity="sha512-juaCj8zi594KHQqb92foyp87mCSriYjw3BcTHaXsAn4pEB1YWh+z+XQScMxIxzsjfM4BeVFV3Ij113lIjWiC2w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

        <script>
            const App = {
                data(){
                    return {
                        managerId:"",
                        managerPwd:""
                    }
                },
                created(){
                    var _this = this;
                    document.onkeydown = function(e){
                        var key = window.event.keyCode;
                        if(key == 13){
                            _this.login();
                        }
                    }
                }
                ,
                methods:{
                    login(){
                        axios({
                            method:"post",
                            url:"./apiManager/Login",
                            data:Qs.stringify({
                                managerId:this.managerId,
                                managerPwd:this.managerPwd
                            })
                        }).then(function(res){
                            console.log(res)
                            switch(res.data.sys_code){
                                case '000':
                                    alert("資料填寫不完全");
                                    break;
                                case '500':
                                    alert('登入失敗，請重新檢查資料');
                                    break;
                                case '200':
                                    location.href="./index";
                                    break;
                            }
                        })
                        
                    }
                }
            }
            Vue.createApp(App).mount("#login-main");

        </script>
    </div>
</body>

</html>