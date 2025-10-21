<?php
// models/CategoryModel.php
require_once ROOT . "core/database.php";
require_once ROOT . "core/helpers.php"; // dùng generateSlug

class CategoryModel extends Database{
    private $id;
    private $name;
    private $thumbnail;
    private $icon;
    private $banner;
    private $slug;
    private $parentId;
    private $description;

    // Constructor
    public function _construct(
        $id = null,
        $name = '',
        $thumbnail = null,
        $icon = null,
        $banner = null,
        $slug = null,
        $parentId = null,
        $description = null
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->thumbnail = $thumbnail;
        $this->icon = $icon;
        $this->banner = $banner;
        $this->slug = $slug;
        $this->parentId = $parentId;
        $this->description = $description;
    }

    // Getter và Setter cho id
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    // Getter và Setter cho name
    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    // Getter và Setter cho thumbnail
    public function getThumbnail() {
        return $this->thumbnail;
    }

    public function setThumbnail($thumbnail) {
        $this->thumbnail = $thumbnail;
    }

    // Getter và Setter cho icon
    public function getIcon() {
        return $this->icon;
    }

    public function setIcon($icon) {
        $this->icon = $icon;
    }

    // Getter và Setter cho banner
    public function getBanner() {
        return $this->banner;
    }

    public function setBanner($banner) {
        $this->banner = $banner;
    }

    // Getter và Setter cho slug
    public function getSlug() {
        return $this->slug;
    }

    public function setSlug($slug) {
        $this->slug = $slug;
    }

    // Getter và Setter cho parentId
    public function getParentId() {
        return $this->parentId;
    }

    public function setParentId($parentId) {
        $this->parentId = $parentId;
    }

    // Getter và Setter cho description
    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }
    protected $table = "categories";

    //  Lấy tất cả category + đếm sản phẩm trong mỗi danh mục
    public function getAllCategories()
    {
        $sql = "
            SELECT c.*, 
                COUNT(DISTINCT p.id) AS product_count
            FROM categories c
            LEFT JOIN products p ON p.category_id = c.id AND p.status = 1
            GROUP BY c.id
            ORDER BY c.id ASC
        ";
        $result = $this->conn->query($sql);
        return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
    }

    // Lấy category có banner (dùng homepage)
    public function getAllWithBanner()
    {
        $sql = "SELECT * FROM {$this->table} WHERE banner IS NOT NULL AND banner <> ''";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Lấy theo slug
    public function getBySlug($slug)
    {
        $sql = "SELECT * FROM {$this->table} WHERE slug = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $slug);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    // ✅ Lấy category theo ID
    public function getCategoryById($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM categories WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // ✅ Thêm category
    public function addCategory($name, $description)
    {
        $stmt = $this->conn->prepare("INSERT INTO categories (name, description) VALUES (?, ?)");
        $stmt->bind_param("ss", $name, $description);
        $stmt->execute();
    }

    // ✅ Cập nhật category
    public function updateCategory($id, $name, $description)
    {
        $stmt = $this->conn->prepare("UPDATE categories SET name = ?, description = ? WHERE id = ?");
        $stmt->bind_param("ssi", $name, $description, $id);
        $stmt->execute();
    }

    // ✅ Xóa category
    public function deleteCategory($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM categories WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }
}
