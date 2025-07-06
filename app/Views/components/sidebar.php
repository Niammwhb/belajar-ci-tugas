<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link <?php echo (uri_string() == '') ? "" : "collapsed" ?>" href="/">
                <i class="bi bi-grid"></i>
                <span>Home</span>
            </a>
        </li><!-- End Home Nav -->

        <li class="nav-item">
           <a class="nav-link <?php echo (uri_string() == 'keranjang') ? "" : "collapsed" ?>" href="<?= base_url('keranjang') ?>">
    <i class="bi bi-cart-check"></i>
    <span>Keranjang</span>
</a>

        </li><!-- End Keranjang Nav --> 
        
        <?php
        if (session()->get('role') == 'admin') {
        ?>
            <li class="nav-item">
                <a class="nav-link <?php echo (uri_string() == 'produk') ? "" : "collapsed" ?>" href="<?= base_url('produk') ?>">
    <i class="bi bi-receipt"></i>
    <span>Produk</span>
</a>

            </li><!-- End Produk Nav -->
        <?php
        }
        ?>

        <?php if (session()->get('role') === 'admin') : ?>
  <li class="nav-item">
    <a class="nav-link collapsed" href="<?= base_url('diskon') ?>">
      <i class="bi bi-percent"></i>
      <span>Diskon</span>
    </a>
  </li>
<?php endif; ?>



        <li class="nav-item">
    <a class="nav-link <?php echo (uri_string() == 'profile') ? "" : "collapsed" ?>" href="<?= base_url('profile') ?>">
    <i class="bi bi-person"></i>
    <span>Profile</span>
</a>
</li><!-- End Profile Nav -->


            <li class="nav-item">
            <a class="nav-link <?php echo (uri_string() == 'faq') ? "" : "collapsed" ?>" href="faq">
                <i class="bi bi-question-circle"></i>
                <span>F.A.Q</span>
            </a>
            </li><!-- End FAQ Nav -->
            
    </ul>

</aside><!-- End Sidebar-->