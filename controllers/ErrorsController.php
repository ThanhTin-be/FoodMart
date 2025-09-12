<?php
class ErrorsController extends Controller {
    public function index() {
        $this->view("errors/404");
    }
}
?>