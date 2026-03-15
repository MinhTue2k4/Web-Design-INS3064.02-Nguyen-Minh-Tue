-- DATABASE: tech_blog_db
-- PURPOSE: Blog system where users write posts and comments, posts belong to categories, and posts can have many tags

-- Create database
CREATE DATABASE tech_blog_db
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

-- Use database
USE tech_blog_db;


-- TABLE: users
-- PURPOSE: Store blog users (authors and commenters)
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,      -- Unique user identifier
    username VARCHAR(100) NOT NULL UNIQUE,  -- Username must be unique
    email VARCHAR(150) NOT NULL UNIQUE,     -- Email must be unique
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


-- TABLE: categories
-- PURPOSE: Each post belongs to exactly one category
CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,      -- Unique category identifier
    name VARCHAR(100) NOT NULL UNIQUE       -- Category name (e.g., Tech, AI, Web)
);


-- TABLE: posts
-- PURPOSE: Blog posts written by users
CREATE TABLE posts (
    id INT AUTO_INCREMENT PRIMARY KEY,      -- Unique post identifier
    user_id INT NOT NULL,                   -- Author of the post
    category_id INT NOT NULL,               -- Category the post belongs to
    title VARCHAR(255) NOT NULL,            -- Post title
    content TEXT,                           -- Post body content
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    -- FK: A post belongs to one user
    FOREIGN KEY (user_id)
        REFERENCES users(id)
        ON DELETE CASCADE,

    -- FK: A post belongs to one category
    FOREIGN KEY (category_id)
        REFERENCES categories(id)
        ON DELETE RESTRICT
);


-- TABLE: tags
-- PURPOSE: Tags used to label posts
CREATE TABLE tags (
    id INT AUTO_INCREMENT PRIMARY KEY,      -- Unique tag identifier
    name VARCHAR(100) NOT NULL UNIQUE       -- Tag name (e.g., SQL, Python, AI)
);


-- TABLE: post_tags
-- PURPOSE: Junction table implementing many-to-many between posts and tags
CREATE TABLE post_tags (
    post_id INT NOT NULL,                   -- Reference to post
    tag_id INT NOT NULL,                    -- Reference to tag

    PRIMARY KEY (post_id, tag_id),          -- Prevent duplicate tag assignments

    FOREIGN KEY (post_id)
        REFERENCES posts(id)
        ON DELETE CASCADE,

    FOREIGN KEY (tag_id)
        REFERENCES tags(id)
        ON DELETE CASCADE
);


-- TABLE: comments
-- PURPOSE: Users leave comments on posts
CREATE TABLE comments (
    id INT AUTO_INCREMENT PRIMARY KEY,      -- Unique comment identifier
    user_id INT NOT NULL,                   -- User who wrote the comment
    post_id INT NOT NULL,                   -- Post being commented on
    content TEXT NOT NULL,                  -- Comment text
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (user_id)
        REFERENCES users(id)
        ON DELETE CASCADE,

    FOREIGN KEY (post_id)
        REFERENCES posts(id)
        ON DELETE CASCADE
);