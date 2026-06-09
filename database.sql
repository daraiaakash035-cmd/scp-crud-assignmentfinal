CREATE DATABASE IF NOT EXISTS scp_database;
USE scp_database;

CREATE TABLE scp_subjects (
    id INT AUTO_INCREMENT PRIMARY KEY,
    item_number VARCHAR(20) NOT NULL,
    object_class VARCHAR(50) NOT NULL,
    title VARCHAR(150) NOT NULL,
    containment TEXT NOT NULL,
    description TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO scp_subjects 
(item_number, object_class, title, containment, description) 
VALUES
('SCP-002', 'Euclid', 'The Living Room', 'SCP-002 must be connected to a suitable power supply at all times and kept in a secure containment chamber.', 'SCP-002 is a biological structure that resembles a furnished room. It appears to absorb organic material and use it to create furniture inside the room.'),

('SCP-003', 'Euclid', 'Biological Motherboard', 'SCP-003 must be kept in a temperature-controlled environment and monitored by authorised personnel only.', 'SCP-003 is a complex object made of biological and electronic components. Its activity changes depending on temperature and external conditions.'),

('SCP-004', 'Euclid', 'The 12 Rusty Keys and the Door', 'SCP-004 must be stored in a secure area. Access to the door and keys requires approval from senior staff.', 'SCP-004 consists of an old wooden door and twelve rusty keys. Different keys appear to cause unusual effects when used with the door.'),

('SCP-005', 'Safe', 'Skeleton Key', 'SCP-005 must be stored in a high-security locker when not being tested.', 'SCP-005 is a key that can open most forms of lock, including mechanical and digital locking systems.'),

('SCP-006', 'Safe', 'Fountain of Youth', 'Access to SCP-006 water must be strictly controlled and testing must be approved before use.', 'SCP-006 is a spring of water that appears to have restorative and healing properties.'),

('SCP-008', 'Euclid', 'Zombie Plague', 'SCP-008 samples must be stored in a sealed biological containment facility.', 'SCP-008 is a dangerous infectious agent that causes symptoms similar to fictional zombie infection.'),

('SCP-009', 'Euclid', 'Red Ice', 'SCP-009 must be kept below freezing temperature and isolated from water sources.', 'SCP-009 is a red substance that behaves differently from normal water and can spread by freezing other liquids.'),

('SCP-012', 'Euclid', 'A Bad Composition', 'SCP-012 must be stored in a sealed chamber and no personnel may directly view it without authorisation.', 'SCP-012 is a musical composition written in blood. People exposed to it may attempt to complete the writing using their own blood.'),

('SCP-035', 'Keter', 'Possessive Mask', 'SCP-035 must be stored in a sealed glass case and monitored for corrosive activity.', 'SCP-035 is a white comedy mask that can influence and control individuals who come into contact with it.'),

('SCP-049', 'Euclid', 'Plague Doctor', 'SCP-049 must be kept in a secure humanoid containment cell and interactions must be supervised.', 'SCP-049 is a humanoid entity dressed like a plague doctor. It claims to cure pestilence but its methods are dangerous.');