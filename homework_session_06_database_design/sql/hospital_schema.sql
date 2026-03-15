-- DATABASE: hospital_management_db
-- PURPOSE: Manage patients, doctors, appointments, prescriptions, and medicines

CREATE DATABASE hospital_management_db
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE hospital_management_db;


-- TABLE: patients
-- Stores patient information
CREATE TABLE patients (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(150) NOT NULL,
    date_of_birth DATE,
    phone VARCHAR(30),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


-- TABLE: doctors
-- Stores doctor information
CREATE TABLE doctors (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(150) NOT NULL,
    specialization VARCHAR(120),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


-- TABLE: appointments
-- Patients book appointments with doctors
CREATE TABLE appointments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    patient_id INT NOT NULL,
    doctor_id INT NOT NULL,
    appointment_time DATETIME NOT NULL,
    status VARCHAR(50),

    FOREIGN KEY (patient_id)
        REFERENCES patients(id)
        ON DELETE CASCADE,

    FOREIGN KEY (doctor_id)
        REFERENCES doctors(id)
        ON DELETE RESTRICT
);


-- TABLE: prescriptions
-- Each appointment generates exactly one prescription
CREATE TABLE prescriptions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    appointment_id INT NOT NULL UNIQUE,
    issued_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (appointment_id)
        REFERENCES appointments(id)
        ON DELETE CASCADE
);


-- TABLE: medicines
-- Stores medicine catalog
CREATE TABLE medicines (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(150) NOT NULL UNIQUE,
    description TEXT
);


-- TABLE: prescription_medicines
-- Junction table implementing N:N between prescriptions and medicines
CREATE TABLE prescription_medicines (
    prescription_id INT NOT NULL,
    medicine_id INT NOT NULL,
    dosage VARCHAR(80),
    frequency VARCHAR(80),

    PRIMARY KEY (prescription_id, medicine_id),

    FOREIGN KEY (prescription_id)
        REFERENCES prescriptions(id)
        ON DELETE CASCADE,

    FOREIGN KEY (medicine_id)
        REFERENCES medicines(id)
        ON DELETE RESTRICT
);