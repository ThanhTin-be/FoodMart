<?php
    class BlogController extends Controller {
        public function index() {
            $this->view("blog/ourblog", ["title" => "Blog"]);
        }

        public function detail() {
            $this->view("blog/detail", ["title" => "Single Post"]);
        }
    }
?>