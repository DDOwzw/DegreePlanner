-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 06, 2019 at 01:08 AM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `www30`
--

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `ClassId` int(11) NOT NULL,
  `ClassName` varchar(100) DEFAULT NULL,
  `ClassPrfx` char(4) DEFAULT NULL,
  `ClassHours` int(11) DEFAULT NULL,
  `elective6000` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`ClassId`, `ClassName`, `ClassPrfx`, `ClassHours`, `elective6000`) VALUES
(5301, 'Professional and Technical Communication', 'CS', 3, 0),
(5333, 'Discrete Structures', 'CS', 3, 0),
(5336, 'Programming Projects in Java', 'CS', 3, 0),
(5343, 'Algorithm Analysis and Data Structures', 'CS', 3, 0),
(5348, 'Operating Systems Concepts', 'CS', 3, 0),
(5349, 'Automata Theory', 'CS', 3, 0),
(5375, 'Principles of UNIX', 'CS', 3, 0),
(5390, 'Computer Networks', 'CS', 3, 0),
(6301, 'Special Topics in Computer Science - Big Data Management and Analytics', 'CS', 3, 1),
(6304, 'Computer Architecture', 'CS', 3, 1),
(6316, 'Agile Methods', 'CS', 3, 1),
(6320, 'Natural Language Processing', 'CS', 3, 1),
(6321, 'Discourse Processing', 'CS', 3, 1),
(6322, 'Information Retrieval', 'CS', 3, 1),
(6324, 'Information Security', 'CS', 3, 1),
(6325, 'Introduction to Bioinformatics', 'CS', 3, 1),
(6329, 'Object Oriented Software Engineering', 'CS', 3, 1),
(6349, 'Network Security', 'CS', 3, 1),
(6352, 'Performance of Computer Systems and Networks', 'CS', 3, 1),
(6353, 'Compiler Construction', 'CS', 3, 1),
(6354, 'Advanced Software Engineering', 'CS', 3, 1),
(6356, 'Software Maintenance, Evolution, and Re-Engineering', 'CS', 3, 1),
(6359, 'Object-Oriented Analysis and Design', 'CS', 3, 1),
(6360, 'Database Design', 'CS', 3, 1),
(6361, 'Advanced Requirements Engineering', 'CS', 3, 1),
(6362, 'Advanced Software Architecture and Design', 'CS', 3, 1),
(6363, 'Design and Analysis of Computer Algorithms', 'CS', 3, 1),
(6364, 'Artificial Intelligence', 'CS', 3, 1),
(6366, 'Computer Graphics', 'CS', 3, 1),
(6367, 'Software Testing and Verification', 'CS', 3, 1),
(6368, 'Telecommunication Network Management', 'CS', 3, 1),
(6371, 'Advanced Programming Languages', 'CS', 3, 1),
(6373, 'Intelligent Systems', 'CS', 3, 1),
(6374, 'Computational Logic', 'CS', 3, 1),
(6375, 'Machine Learning', 'CS', 3, 1),
(6377, 'Introduction to Cryptography', 'CS', 3, 1),
(6378, 'Advanced Operating Systems', 'CS', 3, 1),
(6380, 'Distributed Computing', 'CS', 3, 1),
(6381, 'Combinatorics and Graph Algorithms', 'CS', 3, 1),
(6382, 'Theory of Computation', 'CS', 3, 1),
(6383, 'Computational Systems Biology', 'CS', 3, 1),
(6384, 'Computer Vision', 'CS', 3, 1),
(6385, 'Algorithmic Aspects of Telecommunication Networks', 'CS', 3, 1),
(6386, 'Telecommunication Software Design', 'CS', 3, 1),
(6387, 'Advanced Software Engineering Project', 'CS', 3, 1),
(6388, 'Software Project Planning and Management', 'CS', 3, 1),
(6390, 'Advanced Computer Networks', 'CS', 3, 1),
(6391, 'Optical Networks', 'CS', 3, 1),
(6392, 'Mobile Computing Systems', 'CS', 3, 1),
(6395, 'Speech Recognition, Synthesis, and Understanding', 'CS', 3, 1),
(6396, 'Real-Time Systems', 'CS', 3, 1),
(6397, 'Synthesis and Optimization of High-Performance Systems', 'CS', 3, 1),
(6398, 'DSP Architectures', 'CS', 3, 1),
(6399, 'Parallel Architectures and Systems', 'CS', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prefix` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `number`, `prefix`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, '5301', 'CS', 'Professional and Technical Communication', 'CS 5301 utilizes an integrated approach to writing and speaking for the technical professions.  The advanced writing components of the course focus on writing professional quality technical documents such as proposals, memos, abstracts, reports, letters, emails, etc.  The advanced oral communication components of the course focus on planning, developing, and delivering dynamic, informative and persuasive presentations.  Advanced skills in effective teamwork, leadership, listening, multimedia and computer generated visual aids are also emphasized.  Graduate students will have a successful communication experience working in a functional team environment using a real time, online learning environment.', '2015-06-01 04:27:32', '2015-06-01 04:27:32'),
(2, '5303', 'CS', 'Computer Science I', 'Computer science problem solving.  The structure and nature of algorithms and their corresponding computer program implementation.  Programming in a high level block-structured language', '2015-06-01 04:27:32', '2015-06-01 04:27:32'),
(3, '5330', 'CS', 'Computer Science II', 'Basic concepts of computer organization: Numbering systems, two\'s complement notation, multi-level machine concepts, machine language, assembly programming and optimization, subroutine calls, addressing modes, code generation process, CPU datapath, pipelining, RISC, CISC, performance calculation.  Co-requisite: CS 5303.', '2015-06-01 04:27:32', '2015-06-01 04:27:32'),
(4, '5333', 'CS', 'Discrete Structures', 'Mathematical foundations of computer science.  Logic, sets, relations, graphs and algebraic structures. Combinatorics and metrics for performance evaluation of algorithms.', '2015-06-01 04:27:32', '2015-06-01 04:27:32'),
(5, '5336', 'CS', 'Programming Projects in Java', 'Overview of the object-oriented philosophy.  Implementation of object-oriented designs using the Java programming environment.  Emphasis on using the browser to access and extend the Java class library.  Prerequisite: CS 5303 or equivalent experience.', '2015-06-01 04:27:32', '2015-06-01 04:27:32'),
(6, '5343', 'CS', 'Algorithm Analysis & Data Structures', 'Formal specifications and representation of lists, arrays, trees, graphs, multilinked structures, strings and recursive pattern structures.  Analysis of associated algorithms.  Sorting and searching, file structures.  Relational data models. Prerequisites: CS 5303, CS 5333.', '2015-06-01 04:27:32', '2015-06-01 04:27:32'),
(7, '5348', 'CS', 'Operating Systems Concepts', 'Processes and threads. Concurrency issues including semaphores, monitors and deadlocks.  Simple memory management.  Virtual memory management.  CPU scheduling algorithms.  I/O management.  File management.  Introduction to distributed systems. Prerequisites: CS 5330 and CS 5343', '2015-06-01 04:27:32', '2015-06-01 04:27:32'),
(8, '5349', 'CS', 'Automata Theory', 'Deterministic and nondeterministic finite automata; regular expressions, regular sets, context-free grammars, pushdown automata, context free languages.  Selected topics from Turing Machines and undecidability.  Prerequisite: CS 5333.', '2015-06-01 04:27:32', '2015-06-01 04:27:33'),
(9, '5354', 'CS', 'Software Engineering', 'Formal specification and program verification.  Software life-cycle models and their stages.  System and software requirements engineering; user-interface design. Software architecture, design, and analysis.  Software testing, validation, and quality assurance.  Corequisite: CS 5343', '2015-06-01 04:27:33', '2015-06-01 04:27:33'),
(10, '5375', 'CS', 'Principles of UNIX', 'Design and history of the UNIX operating system.  Detailed study of process and file system data structures. Shell programming in UNIX.  Use of process-forking functionality of UNIX to simplify complex problems.  Interprocess communication and coordination. Device drivers and streams as interfaces to hardware features.  TCP/IP and other UNIX inter-machine communication facilities.  Prerequisite: CS 3335.', '2015-06-01 04:27:33', '2015-06-01 04:27:33'),
(11, '5390', 'CS', 'Computer Networks', 'The design and analysis of protocols for computer networking.  Topics include: network protocol design and composition via layering, contention resolution in multi-access networks, routing metrics and optimal path searching, traffic management, global network protocols; dealing with heterogeneity and scalability.  Prerequisite: CS 5343.', '2015-06-01 04:27:33', '2015-06-01 04:27:33'),
(12, '5V71', 'CS', 'Cooperative Education', 'Placement in a faculty-supervised work environment in industry or government.  Sites may be local or out-of-state.  The cooperative education program provides exposure to a professional working environment, application of theory to working realities, and an opportunity to test skills and clarify goals.  Experience gained may also serve as a work credential after graduation.', '2015-06-01 04:27:33', '2015-06-01 04:27:33'),
(13, '5V81', 'CS', 'Special Topics in Computer Science', 'Selected topics in Computer Science.', '2015-06-01 04:27:33', '2015-06-01 04:27:33'),
(14, '6301', 'CS', 'Special Topics in Computer Science', 'Topics will vary.', '2015-06-01 04:27:33', '2015-06-01 04:27:33'),
(15, '6304', 'CS', 'Computer Architecture', 'Trends in processor, memory, I/O and system design.  Techniques for quantitative analysis and evaluation of computer systems to understand and compare alternative design choices in system design.  Components in high performance processors in computers: pipelining, instruction level parallelism, memory hierarchies, and input/output.  Students will undertake a major computing system analysis and design project.  Prerequisite: CS 3340, CS 4341 and C/C ++.', '2015-06-01 04:27:33', '2015-06-01 04:27:33'),
(16, '6320', 'CS', 'Natural Language Processing', 'This course covers state-of-the-art methods for natural language processing.  After an introduction to the basics of syntax, semantic, and discourse analysis, the focus shifts to the integration of these modules into natural-language processing systems.  In addition to natural language understanding, the course presents advanced material on lexical knowledge acquisition, natural language generation, machine translation, and parallel processing of natural language. Prerequisite: CS 5343.', '2015-06-01 04:27:33', '2015-06-01 04:27:33'),
(17, '6321', 'CS', 'Discourse Processing', 'Introduction to discourse processing from natural language texts.  Automatic clustering of utterances into coherent units', '2015-06-01 04:27:33', '2015-06-01 04:27:33'),
(18, '6322', 'CS', 'Information Retrieval', 'This course covers modern techniques for storing and retrieving unformatted textual data and providing answers to natural language queries.  Current research topics and applications of information retrieval in data mining, data warehousing, text mining, digital libraries, hypertext, multimedia data, and query processing are also presented.  Prerequisite: CS 5343.', '2015-06-01 04:27:33', '2015-06-01 04:27:33'),
(19, '6324', 'CS', 'Information Security', 'A comprehensive study of security vulnerabilities in information systems and the basic techniques for developing secure applications and practicing safe computing. Topics include common attacking techniques such as buffer overflow, Trojan, virus, etc.  UNIX, Windows and Java security.  Conventional encryption. Hashing functions and data integrity.  Public-key encryption', '2015-06-01 04:27:33', '2015-06-01 04:27:33'),
(20, '6325', 'CS', 'Introduction to Bioinformatics', 'The course provides a broad overview of the bioinformatics field.  Comprehensive introduction to molecular biology and molecular genetics for a program of study in bioinformatics.  Discussion of elementary computer algorithms in biology', '2015-06-01 04:27:33', '2015-06-01 04:27:33'),
(21, '6333', 'CS', 'Algorithms in Computational Biology', 'The principles of algorithm design for biological datasets, and analysis of influential problems and techniques.  Biological sequence analysis, gene finding, RNA folding, protein folding, sequence alignment, genome assembly, comparative genomics, phylogenetics, clustering algorithms.  Prerequisite: CS 6325.', '2015-06-01 04:27:33', '2015-06-01 04:27:33'),
(22, '6348', 'CS', 'Data and Applications Security', 'The course will teach principles, technologies, tools and trends for data and applications security. Topics to be covered include: confidentiality, privacy and trust management; secure databases; secure distributed systems; secure multimedia and object systems; secure data warehouses; data mining for security applications; assured information sharing; secure knowledge management; secure collaboration; secure digital libraries; trustworthy semantic web; biometrics; digital forensics; secure e-commerce; secure sensor information management and secure social networks. Students will take one system or application and develop a secure version of that system or application for the programming project. Prerequisite: CS 5343', '2015-06-01 04:27:33', '2015-06-01 04:27:33'),
(23, '6349', 'CS', 'Network Security', 'This course covers theoretical and practical aspects of network security. The topics include use of cryptography for building secure communication protocols and authentication systems; security handshake pitfalls, Kerberos and PKI, security of TCP/IP protocols including IPsec, BGP security, VPNs, IDSes, firewalls, and anonymous routing; security of TCP/IP applications; wireless LAN security; denial-of-service defense. Students are required to do a programming project building a distributed application with certain secure communication features and required to participate in several network security lab exercises and cyber war games. Prerequisite: CS 5390', '2015-06-01 04:27:33', '2015-06-01 04:27:33'),
(24, '6352', 'CS', 'Performance of Computer Systems and Networks', 'Overview of case studies.  Quick review of principles of probability theory.  Queuing models and physical origin of random variables used in queuing models.  Various important cases of the M/M/m/N queuing system. Little\'s law.  The M/G/1 queuing system.  Simulation of queuing systems. Product form solutions of open and closed queuing networks.  Convolution algorithms and Mean Value Analysis for closed queuing networks.  Discrete time queuing systems.  Prerequisite: a first course on probability theory.', '2015-06-01 04:27:33', '2015-06-01 04:27:33'),
(25, '6353', 'CS', 'Compiler Construction', 'Lexical analyzers, context-free grammars.  Top-down and bottom-up parsing; shift reduce and LR parsing.  Operator-precedence, recursive-descent, predictive, and LL parsing. LR', '2015-06-01 04:27:33', '2015-06-01 04:27:33'),
(26, '6354', 'CS', 'Advanced Software Engineering', 'This course covers advanced theoretical concepts in software engineering and provides an extensive hands-on experience in dealing with various issues of software development.  It involves a semester-long group software development project spanning software project planning and management, analysis of requirements, construction of software architecture and design, implementation, and quality assessment.  The course will introduce formal specification, component-based software engineering, and software maintenance and evolution.  Prerequisites: CE/CS/SE 5354', '2015-06-01 04:27:33', '2015-06-01 04:27:33'),
(27, '6356', 'CS', 'Software Maintenance, Evolution, and Re-Engineering', 'Principles and techniques of software maintenance.  Impact of software development process on software justifiability, maintainability, evolvability, and planning of release cycles.  Use of very high-level languages and dependencies for forward engineering and reverse engineering. Achievements, pitfalls, and trends in software reuse, reverse engineering, and re-engineering.  Prerequisite: CE/CS/SE 5354.', '2015-06-01 04:27:33', '2015-06-01 04:27:33'),
(28, '6359', 'CS', 'Object-Oriented Analysis and Design', 'Analysis and practice of modern tools and concepts that can help produce software that is tolerant of change.  Consideration of the primary tools of encapsulation and inheritance.  Construction of software-ICs which show the parallel with hardware construction.  Prerequisites: CE/CS/SE 5354 and either CS 3335 or CS 5336.', '2015-06-01 04:27:33', '2015-06-01 04:27:33'),
(29, '6360', 'CS', 'Database Design', 'Methods, principles, and concepts that are relevant to the practice of database software design. Database system architecture; conceptual database models; relational and object-oriented databases; database system implementation; query processing and optimization; transaction processing concepts, concurrency, and recovery; security.  Prerequisite: CS 5343.', '2015-06-01 04:27:33', '2015-06-01 04:27:33'),
(30, '6361', 'CS', 'Advanced Requirements Engineering', 'System and software requirements engineering.  Identification, elicitation, modeling, analysis, specification, management, and evolution of functional and non-functional requirements.  Strengths and weaknesses of different techniques, tools, and object-oriented methodologies.  Interactions and trade-offs among hardware, software, and organization.  System and sub-system integration with software and organization as components of complex, composite systems.  Transition from requirements to design.  Critical issues in requirements engineering.  Prerequisite: CE/CS/SE 5354.', '2015-06-01 04:27:33', '2015-06-01 04:27:33'),
(31, '6362', 'CS', 'Advanced Software Architecture and Design', 'Concepts and methodologies for the development, evolution, and reuse of software architecture and design, with an emphasis on object-orientation. Identification, analysis, and synthesis of system data, process, communication, and control components.  Decomposition, assignment, and composition of functionality to design elements and connectors.  Use of non-functional requirements for analyzing trade-offs and selecting among design alternatives.  Transition from requirements to software architecture, design, and to implementation.  State of the practice and art.  Prerequisite: CE/CS/SE 5354.', '2015-06-01 04:27:33', '2015-06-01 04:27:33'),
(32, '6363', 'CS', 'Design and Analysis of Computer Algorithms', 'The study of efficient algorithms for various computational problems.  Algorithm design techniques.  Sorting, manipulation of data structures, graphs, matrix multiplication, and pattern matching.  Complexity of algorithms, lower bounds, NP completeness.  Prerequisite: CS 5343.', '2015-06-01 04:27:33', '2015-06-01 04:27:33'),
(33, '6364', 'CS', 'Artificial Intelligence', 'Design of machines that exhibit intelligence.  Particular topics include: representation of knowledge, vision, natural language processing, search, logic and deduction, expert systems, planning, language comprehension, machine learning.  Prerequisite: CS 5343.', '2015-06-01 04:27:33', '2015-06-01 04:27:33'),
(34, '6365', 'CS', 'Data and Text Mining for Computational Biology', 'The course introduces data and text mining as practiced currently in the bioinformatics field.  Major topics include: sequence alignment for determining similarity between proteins and genes; properties of similarities and distances; genomic, proteomic, and text databases in the real world; finding patterns', '2015-06-01 04:27:33', '2015-06-01 04:27:33'),
(35, '6366', 'CS', 'Computer Graphics', 'Device and logical coordinate systems.  Geometric transformations in two and three dimensions.  Algorithms for basic 2-D drawing primitives, such as Brensenham\'s algorithm for lines and circles, Bezier and B-Spline functions for curves, and line and polygon clipping algorithms.  Perspectives in 3-D, and hidden-line and hidden-face elimination, such as Painter\'s and Z-Buffer algorithms.  Fractals and the Mandelbrot set.  Prerequisites: CS 5330, CS 5343, and MATH 2418', '2015-06-01 04:27:33', '2015-06-01 04:27:33'),
(36, '6367', 'CS', 'Software Testing, Validation and Verification', 'Fundamental concepts of software testing. Functional testing. GUI based testing tools. Control flow based test adequacy criteria. Data flow based test adequacy criteria.  White box based testing tools. Mutation testing and testing tools. Relationship between test adequacy criteria. Finite state machine based testing. Static and dynamic program slicing for testing and debugging. Software reliability. Formal verification of program correctness.  Prerequisite: CE/CS/SE 5354 or consent of instructor.', '2015-06-01 04:27:33', '2015-06-01 04:27:33'),
(37, '6368', 'CS', 'Telecommunication Network Management', 'In-depth study of network management issues and standards in telecommunication networks.  OSI management protocols including CMIP, CMISE, SNMP, and MIB.  ITU\'s TMN', '2015-06-01 04:27:33', '2015-06-01 04:27:33'),
(38, '6369', 'CS', 'Complexity of Combinatorial Algorithms', 'Topics include bounded reducibility and completeness, approximation algorithms and heuristics for NP-hard problems, randomized algorithms, additional complexity classes.  Prerequisite: CS 6363.', '2015-06-01 04:27:33', '2015-06-01 04:27:33'),
(39, '6371', 'CS', 'Advanced Programming Languages', 'Functional programming, Lambda calculus, logic programming, abstract syntax, denotational semantics of imperative languages, fixpoints semantics, verification of programs, partial evaluation, interpetation and automatic compilation, axiomatic semantics, applications of semantics to software engineering. Prerequisites: CS 5343, CS 5349.', '2015-06-01 04:27:33', '2015-06-01 04:27:33'),
(40, '6373', 'CS', 'Intelligent Systems', 'Logical formalizations of knowledge for the purpose of implementing intelligent systems that can reason in a way that mimics human reasoning.  Topics include: syntax and semantics of common logic, description logic, modal epistemic logic; reasoning about uncertainties, beliefs, defaults and counterfactuals; reasoning within contexts; implementations of knowledge base and textual inference reasoning systems; and applications.  Prerequisite: CS 5343.', '2015-06-01 04:27:33', '2015-06-01 04:27:33'),
(41, '6374', 'CS', 'Computational Logic', 'Methods and algorithms for the solution of logic problems.  Topics include problem formulation in first order logic and extensions, theorem proving algorithms, polynomially solvable cases, logic programming, and applications.  Prerequisites: CS 5343, and knowledge of C.', '2015-06-01 04:27:33', '2015-06-01 04:27:33'),
(42, '6375', 'CS', 'Machine Learning', 'Algorithms for training perceptions and multi-layer neural nets: back propagation, Boltzmann machines, and self-organizing nets. The ID3 and the Nearest Neighbor algorithms. Formal models for analyzing learnability: exact identification in the limit and probably approximately correct', '2015-06-01 04:27:33', '2015-06-01 04:27:33'),
(43, '6376', 'CS', 'Parallel Processing', 'Topics include parallel machine models, parallel algorithms for sorting, searching and matrix operations. Parallel graph algorithms.  Selected topics in parallel processing. Prerequisite: CS 6363.', '2015-06-01 04:27:33', '2015-06-01 04:27:33'),
(44, '6377', 'CS', 'Introduction to Cryptography', 'This course covers the basic aspects of modern cryptography, including block ciphers, pseudorandom functions, symmetric encryption, Hash functions, message authentication, number-theoretic primitives, public-key encryption, digital signatures and zero knowledge proofs.  Prerequisites: CS 5333 and CS 5343.', '2015-06-01 04:27:33', '2015-06-01 04:27:33'),
(45, '6378', 'CS', 'Advanced Operating Systems', 'Concurrent processing, inter-process communication, process synchronization, deadlocks, introduction to queuing theory and operational analysis, topics in distributed systems and algorithms, checkpointing, recovery, multiprocessor operating systems.  Prerequisites: CS 5348 or equivalent; knowledge of C and UNIX.', '2015-06-01 04:27:33', '2015-06-01 04:27:33'),
(46, '6379', 'CS', 'Biological Database Systems and Data Mining', 'Relational data models and database management systems; theories and techniques of constructing relational databases to store biological data, including sequences, structures, genetic linkages and maps, and signal pathways.  Introduction to a relational database query language', '2015-06-01 04:27:33', '2015-06-01 04:27:33'),
(47, '6380', 'CS', 'Distributed Computing', 'Topics include distributed algorithms, election algorithms, synchronizers, mutual exclusion, resource allocation, deadlocks, Byzantine agreement and clock synchronization, knowledge and common knowledge, reliability in distributed networks, proving distributed programs correct.  Prerequisite: CS 5348.', '2015-06-01 04:27:33', '2015-06-01 04:27:33'),
(48, '6381', 'CS', 'Combinatorics and Graph Algorithms', 'Fundamentals of combinatorics and graph theory.  Combinatorial optimization, optimization algorithms for graphs', '2015-06-01 04:27:33', '2015-06-01 04:27:33'),
(49, '6382', 'CS', 'Theory of Computation', 'Formal models of computation. Recursive function theory.  Undecidability and incompleteness.  Selected topics in theory of computation.  Prerequisite: Consent of Instructor.', '2015-06-01 04:27:33', '2015-06-01 04:27:33'),
(50, '6383', 'CS', 'Computational Systems Biology', 'The course will provide a system-level understanding of biological systems by analyzing biological data using computational techniques.  The major topics include: computational inference of biological networks', '2015-06-01 04:27:33', '2015-06-01 04:27:33'),
(51, '6384', 'CS', 'Computer Vision', 'Algorithms for extracting information from digital pictures.  Particular topics include: analysis of motion in time varying image sequences, recovering depth from a pair of stereo images, image separation, recovering shape from textured images and shadows, object matching techniques, model based recognition, the Hough transform. Prerequisite: CS 5343.', '2015-06-01 04:27:33', '2015-06-01 04:27:33'),
(52, '6385', 'CS', 'Algorithmic Aspects of Telecommunication Networks', 'This is an advanced course on topics related to the design, analysis, and development of telecommunications systems and networks.  The focus is on the efficient algorithmic solutions for key problems in modern telecommunications networks, in centralized and distributed models.  Topics include: main concepts in the design of distributed algorithms in synchronous and asynchronous models, analysis techniques for distributed algorithms, centralized distributed solutions for handling design and optimization problems concerning network topology, architecture, routing, survivability, reliability, congestion, dimensioning and traffic management in modern telecommunication networks.  Prerequisites: CS 5343, CS 5348, and TE 3341 or equivalents.', '2015-06-01 04:27:33', '2015-06-01 04:27:33'),
(53, '6386', 'CS', 'Telecommunication Software Design', 'Programming with sockets and remote procedure calls, real time programming concepts and strategies.  Operating system design for real time systems.  Encryption, file compression, and implementation of fire walls.  An in-depth study of TCP/IP implementation.  Introduction to discrete event simulation of networks. Prerequisites: CS 5390.', '2015-06-01 04:27:33', '2015-06-01 04:27:33'),
(54, '6387', 'CS', 'Advanced Software Engineering Project', 'This course is intended to provide experience in a group project that requires advanced technical solutions, such as distributed multi-tier architectures, component-based technologies, automated software engineering, etc., for developing applications, such as web-based systems, knowledge-based systems, real-time systems, etc. The students will develop and maintain requirements, architecture and detailed design, implementation, and testing and their traceability relationships. Best practices in software engineering will be applied. Prerequisites: CS/SE 6361 or SYSM 6309, and CS/SE 6362. Corequisite: CE/CS/SE 6367 or SYSM 6310.', '2015-06-01 04:27:33', '2015-06-01 04:27:33'),
(55, '6388', 'CS', 'Software Project Planning and Management', 'Techniques and disciplines for successful management of software projects. Project planning and contracts.  Advanced cost estimation models.  Risk management process and activities.  Advanced scheduling techniques. Definition, management, and optimization of software engineering processes. Statistical process control.  Software configuration management.  Capability Maturity Model Integration', '2015-06-01 04:27:33', '2015-06-01 04:27:33'),
(56, '6389', 'CS', 'Formal Methods and Programming Methodology', 'Formal techniques for building highly reliable systems.  Use of abstractions for concisely and precisely defining system behavior.  Formal logic and proof techniques for verifying the correctness of programs. Hierarchies of abstractions, state transition models, Petri Nets, communicating processes.  Operational and definitional specification languages.  Applications to reliability-critical, safety-critical, and mission-critical systems, ranging from commercial computer communication systems to strategic command control systems.  Prerequisite: CE/CS/SE 5354.', '2015-06-01 04:27:33', '2015-06-01 04:27:33'),
(57, '6390', 'CS', 'Advanced Computer Networks', 'Survey of recent advancements in high-speed network technologies.  Application of quantitative approach to the study of broadband integrated networks including admission control, access control, and quality of service guarantee. Prerequisite: CS 5390.', '2015-06-01 04:27:33', '2015-06-01 04:27:33'),
(58, '6391', 'CS', 'Optical Networks', 'Enabling technologies for optical networks.  Wavelength-division multiplexing. Broadcast-and-select optical networks. Wavelength-routed optical networks. Virtual topology design. Routing and wavelength assignment. Network control and management. Protection and restoration. Wavelength conversion. Traffic grooming. Photonic packet switching. Optical burst switching. Survey of recent advances in optical networking. Prerequisite: CS 5390 AND one of CS 6352, CS 6385, CS 6390.', '2015-06-01 04:27:33', '2015-06-01 04:27:33'),
(59, '6392', 'CS', 'Mobile Computing Systems', 'Topics include coping with mobility of computing systems, data management, reliability issues, packet transmission, mobile IP, end-to-end reliable communication, channel and other resource allocation, slot assignment, routing protocols, and issues in mobile wireless networks', '2015-06-01 04:27:33', '2015-06-01 04:27:33'),
(60, '6393', 'CS', 'Advanced Algorithms in Biology', 'Recent advanced topics in algorithms in biology will be discussed.  Topics will be chosen from: sorting and transformational operations on strings and permutations, structural analysis of proteins, pooling design and nonadaptive group testing, approximation algorithms, and complexity issues.  Prerequisites: CS 6363 and CS 6325.', '2015-06-01 04:27:33', '2015-06-01 04:27:34'),
(61, '6394', 'CS', 'Digital Telephony', 'Introduction and overview emphasizing the advantages of digital voice networks.  Voice digitization. Digital transmission, multiplexing, and switching.  Rearrangeable switching networks.  Digital modulation for radio systems.  Network operation issues: synchronization, control; integration of voice and data, packet switching and traffic analysis.', '2015-06-01 04:27:34', '2015-06-01 04:27:34'),
(62, '6395', 'CS', 'Speech Recognition, Synthesis, and Understanding', 'Basic speech processing techniques: isolated word recognition using dynamic time warping, acoustic modeling using hidden Markov models, statistical language modeling, search algorithms in large vocabulary continuous speech recognition, components in text-to-speech systems, architecture and components in spoken dialog systems.  Prerequisite: CS 5343.', '2015-06-01 04:27:34', '2015-06-01 04:27:34'),
(63, '6396', 'CS', 'Real-Time Systems', 'Introduction to real-time applications and concepts.  Real-time operating systems and resource management.  Specification and design methods for real-time systems.  System performance analysis and optimization techniques. Project to specify, analyze, design, implement and test small real-time system.  Prerequisite: CS 5348.', '2015-06-01 04:27:34', '2015-06-01 04:27:34'),
(64, '6397', 'CS', 'Synthesis and Optimization of High-Performance Systems', 'A comprehensive study of the high-level synthesis and optimization algorithms for designing high performance systems with multiple CPUs or functional units for critical applications such as Multimedia, Signal processing, Telecommunications, Networks, and Graphics applications, etc. Topics including algorithms for architecture-level synthesis, scheduling, resource binding, real-time systems, parallel processor array design and mapping, code generations for DSP processors, embedded systems and hardware/software codesigns.  Prerequisite: CS 5343.', '2015-06-01 04:27:34', '2015-06-01 04:27:34'),
(65, '6398', 'CS', 'DSP Architectures', 'Typical DSP algorithms, representation of DSP algorithms, data-graph, FIR filters, convolutions, Fast Fourier Transform, Discrete Cosine Transform, low power design, VLSI implementation of DSP algorithms, implementation of DSP algorithms on DSP processors, DSP applications including wireless communication and multimedia.  Prerequisite: CS 5343.', '2015-06-01 04:27:34', '2015-06-01 04:27:34'),
(66, '6399', 'CS', 'Parallel Architectures and Systems', 'A comprehensive study of the fundamentals of parallel systems and architecture. Topics including parallel programming environment, fine-grain parallelism such as VLIW and superscalar, parallel computing paradigm of shared-memory, distributed-memory, data-parallel and data-flow models, cache coherence, compiling techniques to improve parallelism, scheduling theory, loop transformations, loop parallelizations and run-time systems.  Prerequisite: CS 5348.', '2015-06-01 04:27:34', '2015-06-01 04:27:34'),
(67, '6V81', 'CS', 'Independent Study in Computer Science', 'Topics vary from semester to semester.  May be repeated for credit as topics vary.', '2015-06-01 04:27:34', '2015-06-01 04:27:34'),
(68, '7301', 'CS', 'Recent Advances in Computing', 'Advanced topics and publications will be selected from the theory, design, and implementation issues in computing.  May be repeated for credit as topics vary.  Prerequisite: Consent of the instructor.', '2015-06-01 04:27:34', '2015-06-01 04:27:34'),
(69, '8V02', 'CS', 'Topics in Computer Science', '', '2015-06-01 04:27:34', '2015-06-01 04:27:34'),
(70, '8V07', 'CS', 'Research', 'Open to students with advanced standing subject to approval of the graduate adviser. May be repeated for credit', '2015-06-01 04:27:34', '2015-06-01 04:27:34'),
(71, '8V98', 'CS', 'Thesis', '', '2015-06-01 04:27:34', '2015-06-01 04:27:34'),
(72, '8V99', 'CS', 'Dissertation', '', '2015-06-01 04:27:34', '2015-06-01 04:27:34'),
(73, '6329', 'CS', 'Object Oriented Software Engineering', 'The most valuable class in UTD. Topics will vary.', '2015-06-01 04:27:33', '2015-06-01 04:27:33'),
(74, '6313', 'CS', 'Statistical Methods for Data Sciences', '', '2019-08-05 22:58:41', '2019-08-05 22:58:41'),
(75, '6350', 'CS', 'Big Data Management and Analytics', '', '2019-08-05 22:58:41', '2019-08-05 22:58:41'),
(76, '6327', 'CS', 'Video Analytics', '', '2019-08-05 22:58:41', '2019-08-05 22:58:41'),
(77, '6347', 'CS', 'Statistics for Machine Learning', '', '2019-08-05 22:58:41', '2019-08-05 22:58:41');

-- --------------------------------------------------------

--
-- Table structure for table `degreeplan`
--

CREATE TABLE `degreeplan` (
  `DegId` smallint(6) NOT NULL,
  `DegName` varchar(50) DEFAULT NULL,
  `DeptId` smallint(6) DEFAULT NULL,
  `numelectives` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `degreeplan`
--

INSERT INTO `degreeplan` (`DegId`, `DegName`, `DeptId`, `numelectives`) VALUES
(1, 'Software Engineering', 1, 6),
(2, 'Data Science', 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `DeptId` smallint(6) NOT NULL,
  `DeptName` varchar(50) DEFAULT NULL,
  `DeptInit` char(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`DeptId`, `DeptName`, `DeptInit`) VALUES
(1, 'Computer Science', 'CS');

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE `grade` (
  `GradeId` smallint(6) NOT NULL,
  `ClassId` int(11) DEFAULT NULL,
  `UserId` smallint(6) DEFAULT NULL,
  `Passed` bit(1) DEFAULT NULL,
  `Grade` decimal(18,2) DEFAULT NULL,
  `GpaWeight` decimal(18,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grade`
--

INSERT INTO `grade` (`GradeId`, `ClassId`, `UserId`, `Passed`, `Grade`, `GpaWeight`) VALUES
(1, 5301, 1, b'1', '85.00', '3.00'),
(2, 5333, 1, b'1', '95.00', '4.00'),
(3, 5343, 1, b'1', '70.00', '2.00'),
(4, 5348, 1, b'1', '85.00', '3.50'),
(5, 5375, 1, b'1', '85.00', '3.50'),
(6, 5390, 1, b'1', '85.00', '3.50'),
(7, 6329, 1, b'1', '96.00', '4.00'),
(8, 6349, 1, b'1', '95.00', '4.00'),
(9, 6329, 2, b'1', '100.00', '4.00'),
(10, 6361, 2, b'1', '95.00', '4.00'),
(11, 6366, 2, b'1', '89.00', '3.00'),
(12, 6378, 2, b'1', '86.00', '3.00'),
(13, 6363, 2, b'1', '100.00', '4.00'),
(14, 6353, 1, b'1', '80.00', '3.00'),
(36, 5375, 2, b'1', '90.00', '4.00'),
(37, 6364, 2, b'1', '99.00', '4.00'),
(38, 6364, 2, b'1', '99.00', '4.00');

-- --------------------------------------------------------

--
-- Table structure for table `gradesrequired`
--

CREATE TABLE `gradesrequired` (
  `GradeId` smallint(6) DEFAULT NULL,
  `ClassId` int(11) DEFAULT NULL,
  `UserId` smallint(6) DEFAULT NULL,
  `Passed` bit(1) DEFAULT NULL,
  `Grade` decimal(18,2) DEFAULT NULL,
  `GpaWeight` decimal(18,2) DEFAULT NULL,
  `id` int(11) DEFAULT NULL,
  `class` int(11) DEFAULT NULL,
  `plan` smallint(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `requiredclasses`
--

CREATE TABLE `requiredclasses` (
  `id` int(11) NOT NULL,
  `class` int(11) NOT NULL,
  `plan` smallint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requiredclasses`
--

INSERT INTO `requiredclasses` (`id`, `class`, `plan`) VALUES
(1, 6329, 1),
(2, 6361, 1),
(3, 6362, 1),
(4, 6367, 1),
(5, 6387, 1),
(6, 6313, 2),
(7, 6350, 2),
(8, 6363, 2),
(9, 6375, 2),
(10, 6301, 2),
(11, 6320, 2),
(12, 6327, 2),
(13, 6347, 2),
(14, 6360, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserId` smallint(6) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Username` varchar(32) NOT NULL,
  `Password` varchar(32) NOT NULL,
  `DegId` smallint(6) DEFAULT NULL,
  `admin` tinyint(4) NOT NULL DEFAULT 0,
  `Admitted` varchar(55) NOT NULL,
  `ExpectedGraducation` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserId`, `Name`, `Username`, `Password`, `DegId`, `admin`, `Admitted`, `ExpectedGraducation`) VALUES
(1, 'Nicholas Ibarra', 'abc123', 'abc123', 1, 0, 'Spring 2015', 'Fall 2019'),
(2, 'John Snow', 'User01', 'abc123', 1, 0, 'Fall 2017', 'Spring 2019'),
(3, 'John Doe', 'User02', 'abc123', 1, 0, 'Spring 2018', 'Fall 2019'),
(4, 'J Wang', 'admin', 'abc123', 2, 1, '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`ClassId`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `degreeplan`
--
ALTER TABLE `degreeplan`
  ADD PRIMARY KEY (`DegId`),
  ADD KEY `DeptId` (`DeptId`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`DeptId`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`GradeId`),
  ADD KEY `ClassId` (`ClassId`),
  ADD KEY `UserId` (`UserId`);

--
-- Indexes for table `requiredclasses`
--
ALTER TABLE `requiredclasses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `plan` (`plan`),
  ADD KEY `class` (`class`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserId`),
  ADD KEY `DegId` (`DegId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `degreeplan`
--
ALTER TABLE `degreeplan`
  MODIFY `DegId` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `DeptId` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
  MODIFY `GradeId` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `requiredclasses`
--
ALTER TABLE `requiredclasses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserId` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
