-- Tạo database
CREATE DATABASE
IF NOT EXISTS foodmart
CHARACTER
SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE foodmart;

-- Bảng Users
CREATE TABLE users
(
    id INT
    AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR
    (100) NOT NULL,
    email VARCHAR
    (150) UNIQUE NOT NULL,
    password VARCHAR
    (255) NOT NULL,
    role ENUM
    ('user', 'admin') DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

    -- Bảng Categories
    CREATE TABLE categories
    (
        id INT
        AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR
        (100) NOT NULL,
    parent_id INT DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

        -- Bảng Products
        CREATE TABLE products
        (
            id INT
            AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR
            (255) NOT NULL,          -- Tên sản phẩm (hiển thị trên card)
    price DECIMAL
            (10,2) NOT NULL,        -- Giá sản phẩm
    description TEXT,                    -- Mô tả chi tiết (cho trang chi tiết sản phẩm)
    short_desc VARCHAR
            (255),             -- Mô tả ngắn (dùng cho homepage)
    image VARCHAR
            (255),                  -- Ảnh thumbnail (hiển thị homepage, card)
    gallery TEXT,                        -- JSON/chuỗi nhiều ảnh (dùng cho trang chi tiết)
    category_id INT,                     -- FK → categories.id
    stock INT DEFAULT 0,                 -- Số lượng tồn kho
    status TINYINT DEFAULT 1,            -- 1=hiện, 0=ẩn
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON
            UPDATE CURRENT_TIMESTAMP
            );


            -- Bảng Orders
            CREATE TABLE orders
            (
                id INT
                AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    total_price DECIMAL
                (10,2) NOT NULL,
    status ENUM
                (
        'cho_xac_nhan',
        'da_xac_nhan',
        'dang_giao',
        'da_giao',
        'thanh_cong',
        'huy'
    ) DEFAULT 'cho_xac_nhan',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON
                UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY
                (user_id) REFERENCES users
                (id) ON
                DELETE CASCADE
);

                -- Bảng Order Items
                CREATE TABLE order_items
                (
                    id INT
                    AUTO_INCREMENT PRIMARY KEY,
    order_id INT,
    product_id INT,
    quantity INT NOT NULL,
    price DECIMAL
                    (10,2) NOT NULL,
    FOREIGN KEY
                    (order_id) REFERENCES orders
                    (id) ON
                    DELETE CASCADE,
    FOREIGN KEY (product_id)
                    REFERENCES products
                    (id) ON
                    DELETE CASCADE
);

                    -- Bảng Blogs
                    CREATE TABLE blogs
                    (
                        id INT
                        AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR
                        (200) NOT NULL,
    content TEXT NOT NULL,
    thumbnail VARCHAR
                        (255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

                        -- Bảng Reviews
                        CREATE TABLE reviews
                        (
                            id INT
                            AUTO_INCREMENT PRIMARY KEY,
    product_id INT,
    user_id INT,
    rating TINYINT CHECK
                            (rating >=1 AND rating <=5),
    comment TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY
                            (product_id) REFERENCES products
                            (id) ON
                            DELETE CASCADE,
    FOREIGN KEY (user_id)
                            REFERENCES users
                            (id) ON
                            DELETE CASCADE
);

                            -- Thêm dữ liệu mẫu

                            -- User admin
                            INSERT INTO users
                                (name, email, password, role)
                            VALUES
                                ('Admin', 'admin@foodmart.com', MD5('123456'), 'admin');

                            -- Danh mục mẫu
                            INSERT INTO categories
                                (name)
                            VALUES
                                ('Trái cây'),
                                ('Rau củ'),
                                ('Đồ uống');

                            -- Sản phẩm mẫu
                            INSERT INTO products
                                (category_id, name, description, price, image, stock)
                            VALUES
                                (1, 'Chuối', 'Chuối chín tự nhiên', 20000, 'thumb-bananas.png', 50),
                                (1, 'Bơ', 'Bơ Đà Lạt', 50000, 'thumb-avocado.png', 30),
                                (2, 'Cà chua', 'Cà chua tươi sạch', 15000, 'thumb-tomatoes.png', 100),
                                (3, 'Sữa tươi', 'Sữa tươi nguyên chất', 30000, 'thumb-milk.png', 40);

                            -- Blog mẫu
                            INSERT INTO blogs
                                (title, content, thumbnail)
                            VALUES
                                ('Khai trương FoodMart', 'FoodMart chính thức khai trương với nhiều ưu đãi...', 'post-thumb-1.jpg'),
                                ('Mẹo chọn rau củ tươi ngon', 'Hướng dẫn cách chọn rau củ tươi...', 'post-thumb-2.jpg');
