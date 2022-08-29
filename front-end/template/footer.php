<?php if($sessions->is_set()): ?>
<footer>
    <div class="container">
        &copy; Copyright <?php echo date('Y')." ".APP_NAME; ?>
    </div>
</footer>
<?php endif; ?>
<script src="<?php echo APP_ASSETS; ?>/bootstrap-5.2.0-dist/js/jquery-3.6.1.min.js"></script>
<script src="<?php echo APP_ASSETS; ?>/bootstrap-5.2.0-dist/js/bootstrap.min.js"></script>
</body>
</html>