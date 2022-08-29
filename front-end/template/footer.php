<?php if($sessions->set()): ?>
<footer>
    <div class="container">
        &copy; Copyright <?php echo date('Y')." ".APP_NAME; ?>
    </div>
</footer>
<?php endif; ?>
<script src="<?php echo APP_ASSETS; ?>/bootstrap-3/js/jquery-3.6.1.min.js"></script>
<script src="<?php echo APP_ASSETS; ?>/bootstrap-3/js/bootstrap.min.js"></script>
</body>
</html>