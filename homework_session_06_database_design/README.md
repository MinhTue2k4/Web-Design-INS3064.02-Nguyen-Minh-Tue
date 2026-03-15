# PART 1: Normalization Challenge – 3NF Schema
## Task 1 – Identify Violations

### 1. Which columns lead to redundancy?

In the `STUDENT_GRADES_RAW` table, the following columns cause redundancy:

- `StudentName`
- `CourseName`
- `ProfessorName`
- `ProfessorEmail`

Example:

| StudentID | StudentName | CourseID | CourseName | ProfessorName | ProfessorEmail | Grade |
|-----------|-------------|----------|------------|---------------|---------------|-------|
| 1 | Nguyen An | 101 | Database Systems | Dr. Le | le@uni.edu | A |
| 1 | Nguyen An | 102 | Web Development | Dr. Tran | tran@uni.edu | B+ |


- `StudentName` repeats for every course a student takes.
- `CourseName` repeats for every student enrolled in the course.
- `ProfessorName` and `ProfessorEmail` repeat for every student in the same course.



---

### 2. Where could update anomalies happen?

Update anomalies occur when changing a value requires updating multiple rows.

#### Professor Email Change

Example: Dr. Le → le@uni.edu


If the professor updates their email: Dr. Le → le_new@uni.edu


All rows containing the old email must be updated.  
If one row is missed, the database becomes inconsistent.

---

#### Course Name Change

Example: Database Systems → Advanced Database Systems


Since `CourseName` appears in many rows, every occurrence must be updated.

---

#### Student Name Change

Example: Nguyen An → Nguyen Anh
---

### 3. Is there any transitive dependency?

Yes.

The table contains **transitive dependencies**, which violates **Third Normal Form (3NF)**.

Example dependency chain: 
CourseID → ProfessorName

ProfessorName → ProfessorEmail
This means: CourseID → ProfessorEmail

`ProfessorEmail` does not depend directly on the primary key of the table. It depends on another non-key attribute (`ProfessorName`).

This is a **transitive dependency**, which violates 3NF and should be removed by separating tables.

# Task 2 – Decompose to 3NF

To eliminate redundancy and update anomalies, the table is decomposed into four tables:

- **Students**
- **Courses**
- **Professors**
- **Enrollments**

Each table stores a single type of entity and uses primary keys and foreign keys to maintain relationships.


---
## 1. Students

**Primary Key:** student_id  

| Column | Description |
|------|-------------|
| student_id | Unique student identifier |
| student_name | Name of the student |

**Purpose**

Stores student information only.
Student data should appear once instead of repeating for every course enrollment.


**Why this table exists**

Separating students prevents repeating `StudentName` across multiple rows and removes redundancy.



---

## 2. Professors

**Primary Key:** professor_id  

| Column | Description |
|------|-------------|
| professor_id | Unique professor identifier |
| professor_name | Name of professor |
| professor_email | Unique email address |

**Purpose**

Stores professor information independently from courses.

**Why this table exists**

In the raw table, professor information repeats for every student in the course.

Separating professors:

- Eliminates repeated data
- Prevents update anomalies
- Ensures unique email addresses
---

## 3. Courses

**Primary Key:** course_id  
**Foreign Key:** professor_id → Professors.professor_id  

| Column | Description |
|------|-------------|
| course_id | Unique course identifier |
| course_name | Name of course |
| professor_id | Instructor teaching the course |

**Purpose**

Stores course information and links each course to a professor.

**Why this table exists**

Courses are independent entities.  
Separating courses ensures that course data appears once and professors are referenced through a foreign key.

---

## 4. Enrollments

**Primary Key:** (student_id, course_id)  
**Foreign Keys:**  
- student_id → Students.student_id  
- course_id → Courses.course_id  

| Column | Description |
|------|-------------|
| student_id | Student enrolled |
| course_id | Course taken |
| grade | Grade obtained |


**Purpose**

Represents the relationship between students and courses.

A student can take multiple courses, and each course can have many students.

**Why this table exists**

The `Enrollments` table connects students and courses while storing the grade for that specific enrollment.

This design:

- Removes redundancy
- Prevents update anomalies
- Ensures the database satisfies **3NF**.

----
# PART 2: Relationship Drills

### 1. Author — Book

**Relationship Type:** Authors → Books **(1:N)**  
One author can write multiple books, but each book typically has one primary author.

**FK Location:**  
`author_id` in the **Books** table (the many side).

---

### 2. Citizen — Passport

**Relationship Type:** Citizens → Passports **(1:1)**  

Each citizen can have only one passport, and each passport belongs to exactly one citizen.

**FK Location:**  
`citizen_id` in the **Passports** table.


---

### 3. Customer — Order

**Relationship Type:** Customers → Orders **(1:N)**  

A customer can place multiple orders, but each order belongs to exactly one customer.

**FK Location:**  
`customer_id` in the **Orders** table.


---

### 4. Student — Class

**Relationship Type:** Students ↔ Classes **(N:N)**  

A student can enroll in multiple classes, and each class can contain multiple students.

**Implementation:**  
Use a **junction table** called `Enrollments`.

**FK Location:**

`Enrollments` table:

- `student_id` → references **Students(student_id)**
- `class_id` → references **Classes(class_id)**


---

### 5. Team — Player

**Relationship Type:** Teams → Players **(1:N)**  

A team can have many players, but each player belongs to one team.

**FK Location:**  
`team_id` in the **Players** table.