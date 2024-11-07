<footer>
          <section class="chu">
            <a><img src="../view/img/logo.png" width="120px"></a>
        <p>Tại cửa hàng chúng tôi, chúng tôi tự hào cung cấp những chiếc bánh kem tinh tế, được làm từ những nguyên liệu tươi ngon nhất và được trau chuốt bởi đôi bàn tay tài năng của các đầu bếp chuyên nghiệp. Với sự sáng tạo và tinh tế, chúng tôi không chỉ mang đến cho khách hàng những chiếc bánh kem ngon miệng mà còn tạo ra những trải nghiệm độc đáo và đáng nhớ.</p>
        </section>
        <section class="ban">
          <h3>Đăng kí để nhận bản tin</h3>
          <p>Nhận bản tin để không bỏ lỡ thông tin và khuyến mãi của </p>
              <input type="email" id="email" onblur="gui()" required>
              <button onclick="gui()">Gửi</button><br>
              <span class="loi" id="loi"></span>
              <script>
                var mail=document.getElementById("email");
                function gui(){
                    if(mail.value==""){
                        document.getElementById("loi").innerHTML="Vui lòng nhập email";
                    }else{
                        document.getElementById("loi").innerHTML="";
                        
                    }
                }
              </script>
          <section class="dichvu">
          <section class="p1">
              <h2>LEADING ONLINE </h2>
              <p>Trở thành cộng tác viên</p>
              <p>Báo giá cửa hàng</p>
          </section>
          <section class="p3">
              <h2>TOP CATEGORIES & BRANDS</h2>
              <p>Tin tức</p>
              <p>Chính sách bảo mật</p>
              <p>Điều khoản sử dụng</p>
              <p>Cơ hội việc làm</p>
          </section>
          <section class="p4">
              <h2>Công ty thành viên</h2>
               <img src="../view/img/map.png">
          </section>
           </section>
           <section class="cuoi">
              <p>Bánh ngọt hot.Hotline: 0368799822</p>
              <p>Địa chỉ: Tòa P, Trường cao đẳng FPT Polytechnic, Nam Từ Liêm,Hà Nội</p>
           </section>
        </section>
      </footer>
  <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</body>
</html>