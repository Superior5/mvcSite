        <footer id="footer">
            <!--Footer-->
            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <p class="pull-left">Copyright © 2015</p>
                        <p class="pull-right">Курс PHP Start</p>
                    </div>
                </div>
            </div>
        </footer>
        <!--/Footer-->

        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="/templates/js/jquery.js"></script>
        <script src="/templates/js/bootstrap.min.js"></script>
        <script src="/templates/js/jquery.scrollUp.min.js"></script>
        <script src="/templates/js/price-range.js"></script>
        <script src="/templates/js/jquery.prettyPhoto.js"></script>
        <script src="/js/main.js"></script>
        <script>
           $(document).ready(function(){
            $(".add-to-cart").click(function() {
                var id = $(this).attr("data-id");
                $.post("/cart/addAjax/"+id, {}, function(data){
                    $("#cart-count").html(data);
                });
                return false;
            });
           });
        </script>
        </body>

        </html>