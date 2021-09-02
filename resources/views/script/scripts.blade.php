<!-- JavaScript -->
<script src="{{asset('/plugins/jquery/jquery-3.4.1.min.js')}}"></script>
<script src="{{asset('/js/popper.min.js')}}"></script>
<script src="{{asset('/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('/js/feather.min.js')}}"></script>
<script src="{{asset('/plugins/perfectscroll/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('/plugins/apexcharts/apexcharts.min.js')}}"></script>
<script src="{{asset('/js/main.min.js')}}"></script>
<script>
    function logout() {
        $("body").append(' \
         <div class="modal fade" id="alert_logout" tabindex="-1" aria-labelledby="alert" aria-hidden="true">\
            <div class="modal-dialog">\
                <div class="modal-content">\
                    <div class="modal-header">\
                        <h5 class="modal-title" id="alert_title">确认退出？</h5>\
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>\
                    </div>\
                    <div class="modal-body" id="alert_content">您将在本浏览器上退出该账号，请确认您的操作</div>\
                    <div class="modal-footer">\
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>\
                        <button type="button" onclick="confirm_logout();" class="btn btn-primary" data-bs-dismiss="modal">确认</button>\
                    </div>\
                </div>\
            </div>\
        </div>')
        let alert = $("#alert_logout")
        alert.modal('show')
    }
    function confirm_logout(){
        $.ajax({
            type: "PUT",
            url: '{{ApiUrl::API.ApiUrl::USER.ApiUrl::LOGOUT}}',
            dataType: "json",
            success: function (result) {
                if (result.code === 200) {
                    window.location = "/";
                } else {
                    showAlert("抱歉","退出失败")
                }
            },
            error: function () {
                showAlert("抱歉","退出失败")
            }
        });
    }

    function showAlert(title, content) {
        let body= $("body");
        body.children("#alert").remove()
        body.append(' \
         <div class="modal fade" id="alert" tabindex="-1" aria-labelledby="alert" aria-hidden="true">\
            <div class="modal-dialog">\
                <div class="modal-content">\
                    <div class="modal-header">\
                        <h5 class="modal-title" id="alert_title">'+title+'</h5>\
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>\
                    </div>\
                    <div class="modal-body" id="alert_content">'+content+'</div>\
                    <div class="modal-footer">\
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">确认</button>\
                    </div>\
                </div>\
            </div>\
        </div>')
        let alert = $("#alert")
        alert.modal('show')
    }
</script>
