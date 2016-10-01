-- MySQL dump 10.13  Distrib 5.1.57, for redhat-linux-gnu (x86_64)
--
-- Host: localhost    Database: a1474846_Coconut
-- ------------------------------------------------------
-- Server version	5.1.57
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Category`
--

DROP TABLE IF EXISTS `Category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `Category` text NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Category`
--

LOCK TABLES `Category` WRITE;
/*!40000 ALTER TABLE `Category` DISABLE KEYS */;
INSERT INTO `Category` VALUES (1,'LABORATORY'),(2,'RADIOLOGY'),(3,'MEDICINE'),(4,'SUPPLIES'),(5,'PROFESSIONAL FEE'),(6,'OTHERS'),(7,'Room And Board');
/*!40000 ALTER TABLE `Category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Company`
--

DROP TABLE IF EXISTS `Company`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Company` (
  `companyNo` int(11) NOT NULL AUTO_INCREMENT,
  `companyName` varchar(100) NOT NULL,
  `companyAddress` varchar(100) NOT NULL,
  `rate1` varchar(100) NOT NULL,
  `rate2` varchar(100) NOT NULL,
  `rate3` varchar(100) NOT NULL,
  `rate4` varchar(100) NOT NULL,
  PRIMARY KEY (`companyNo`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Company`
--

LOCK TABLES `Company` WRITE;
/*!40000 ALTER TABLE `Company` DISABLE KEYS */;
INSERT INTO `Company` VALUES (1,'MEDICARD','makati city','100','200','300','400'),(2,'','','','','',''),(3,'INTELLICARE','makati City','150','250','350','450'),(4,'MEDICARE','Pasig City','100','200','300','400');
/*!40000 ALTER TABLE `Company` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `DoctorService`
--

DROP TABLE IF EXISTS `DoctorService`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `DoctorService` (
  `serviceNo` int(11) NOT NULL AUTO_INCREMENT,
  `serviceName` varchar(100) NOT NULL,
  `specialization` varchar(100) NOT NULL,
  `cashAmount` varchar(100) NOT NULL,
  `companyRate` varchar(100) NOT NULL,
  `doctorShare` varchar(100) NOT NULL,
  `discount` varchar(100) NOT NULL,
  PRIMARY KEY (`serviceNo`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `DoctorService`
--

LOCK TABLES `DoctorService` WRITE;
/*!40000 ALTER TABLE `DoctorService` DISABLE KEYS */;
INSERT INTO `DoctorService` VALUES (1,'Consultation','OPTHA','350','rate1','.40','40'),(2,'Consultation','ORTHO','300','rate2','.50','0'),(3,'Consultation','IM_CARDIO','400','rate1','.70',''),(4,'Admitting','OPTHA','2000','rate1','1','0');
/*!40000 ALTER TABLE `DoctorService` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `DoctorSpecialization`
--

DROP TABLE IF EXISTS `DoctorSpecialization`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `DoctorSpecialization` (
  `Specialization` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `DoctorSpecialization`
--

LOCK TABLES `DoctorSpecialization` WRITE;
/*!40000 ALTER TABLE `DoctorSpecialization` DISABLE KEYS */;
INSERT INTO `DoctorSpecialization` VALUES ('OPTHA'),('URO'),('SURGEON'),('IM_CARDIO'),(''),('RADIOLOGIST');
/*!40000 ALTER TABLE `DoctorSpecialization` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Doctors`
--

DROP TABLE IF EXISTS `Doctors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Doctors` (
  `doctorCode` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  `Specialization1` varchar(100) NOT NULL,
  `Specialization2` varchar(100) NOT NULL,
  `Specialization3` varchar(100) NOT NULL,
  `Specialization4` varchar(100) NOT NULL,
  `Specialization5` varchar(100) NOT NULL,
  `PhilHealth_AccreditationNo` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `module` varchar(100) NOT NULL,
  PRIMARY KEY (`doctorCode`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Doctors`
--

LOCK TABLES `Doctors` WRITE;
/*!40000 ALTER TABLE `Doctors` DISABLE KEYS */;
INSERT INTO `Doctors` VALUES (12,'Juan Dela Cruz','IM_CARDIO','','','','','--','juanDoc','juanDoc','DOCTOR'),(14,'Laxa, Genesis','OPTHA','','','','','0291-3322143-1','laxa','laxa','DOCTOR'),(16,'TEST DOCTOR','OPTHA','','','','','--','testdoc','testdoc','DOCTOR');
/*!40000 ALTER TABLE `Doctors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `PhilHealth`
--

DROP TABLE IF EXISTS `PhilHealth`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `PhilHealth` (
  `membership` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `PhilHealth`
--

LOCK TABLES `PhilHealth` WRITE;
/*!40000 ALTER TABLE `PhilHealth` DISABLE KEYS */;
INSERT INTO `PhilHealth` VALUES ('SSS'),('GSIS'),('INDIGENT');
/*!40000 ALTER TABLE `PhilHealth` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `SOAP`
--

DROP TABLE IF EXISTS `SOAP`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `SOAP` (
  `soapNo` int(11) NOT NULL AUTO_INCREMENT,
  `itemNo` int(11) NOT NULL,
  `registrationNo` int(11) NOT NULL,
  `subjective` varchar(100) NOT NULL,
  `objective` varchar(100) NOT NULL,
  `assessment` varchar(100) NOT NULL,
  `plan` varchar(100) NOT NULL,
  PRIMARY KEY (`soapNo`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `SOAP`
--

LOCK TABLES `SOAP` WRITE;
/*!40000 ALTER TABLE `SOAP` DISABLE KEYS */;
INSERT INTO `SOAP` VALUES (7,218,351,'hi','ji','ki','lonnm');
/*!40000 ALTER TABLE `SOAP` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Services`
--

DROP TABLE IF EXISTS `Services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Services` (
  `serviceNo` int(11) NOT NULL AUTO_INCREMENT,
  `Service` varchar(100) NOT NULL,
  `Category` varchar(100) NOT NULL,
  PRIMARY KEY (`serviceNo`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Services`
--

LOCK TABLES `Services` WRITE;
/*!40000 ALTER TABLE `Services` DISABLE KEYS */;
INSERT INTO `Services` VALUES (1,'Examination','RADIOLOGY'),(2,'Examination','LABORATORY'),(3,'Consultation','PROFESSIONAL FEE'),(4,'Medication','MEDICINE'),(5,'Others ','SUPPLIES'),(6,'Others','OTHERS'),(7,'Examination','LABORATORY'),(8,'Examination','RADIOLOGY');
/*!40000 ALTER TABLE `Services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `availableCharges`
--

DROP TABLE IF EXISTS `availableCharges`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `availableCharges` (
  `chargesCode` int(11) NOT NULL AUTO_INCREMENT,
  `Description` varchar(100) NOT NULL,
  `Service` varchar(100) NOT NULL,
  `Category` varchar(100) NOT NULL,
  `OPD` varchar(100) NOT NULL,
  `WARD` varchar(100) NOT NULL,
  `SOLOWARD` varchar(100) NOT NULL,
  `SEMIPRIVATE` varchar(100) NOT NULL,
  `PRIVATE` varchar(100) NOT NULL,
  PRIMARY KEY (`chargesCode`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `availableCharges`
--

LOCK TABLES `availableCharges` WRITE;
/*!40000 ALTER TABLE `availableCharges` DISABLE KEYS */;
INSERT INTO `availableCharges` VALUES (4,'cbc','Examination','LABORATORY','     20','    20','    10','    10','    30'),(5,'Urinalysis','Examination','LABORATORY',' 1000.00','100 0.00',' 1000.00',' 100.00','100.00'),(6,'CBC w/ PC','Examination','LABORATORY',' 1000.00',' 1000.00',' 1000.00',' 1000.00',' 1000.00'),(8,'CHEST PA','Examination','RADIOLOGY','200.00',' 0.00',' 0.00',' 0.00',' 0.00'),(9,'Telephone Remittance','Others','OTHERS',' 50',' 50',' 50',' 50',' 50'),(15,'','','','','','','',''),(16,'43434343434','','MAINTENANCE',' 0.00',' 0.00',' 0.00',' 0.00',''),(17,'232323','','MAINTENANCE',' 0.00',' 0.00',' 0.00',' 0.00',''),(18,'3232321111123211','','MAINTENANCE',' 0.00',' 0.00',' 0.00',' 0.00',''),(19,'3333333333333333333333','','MAINTENANCE',' 0.00',' 0.00',' 0.00',' 0.00','');
/*!40000 ALTER TABLE `availableCharges` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `availableICD`
--

DROP TABLE IF EXISTS `availableICD`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `availableICD` (
  `icdTrackNo` int(11) NOT NULL AUTO_INCREMENT,
  `icdCode` varchar(100) NOT NULL,
  `diagnosis` varchar(100) NOT NULL,
  PRIMARY KEY (`icdTrackNo`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `availableICD`
--

LOCK TABLES `availableICD` WRITE;
/*!40000 ALTER TABLE `availableICD` DISABLE KEYS */;
INSERT INTO `availableICD` VALUES (5,'A15.0','Pulmonary Tuberculosis Class 2 by Sputum Confirmation'),(6,'A16.0','Pulmonary Tuberculosis Class 2 by X-ray confirmation'),(7,'N39.0','Pyuria'),(8,'R21','Rash'),(9,'I71.4','Abdominal Aortic Aneurysm'),(10,'R10.4','Abdominal Colic'),(11,'S00.8','Abrasion, Chin'),(12,'S20.8','Abrasions, Chest wall');
/*!40000 ALTER TABLE `availableICD` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `branch`
--

DROP TABLE IF EXISTS `branch`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `branch` (
  `branchID` int(11) NOT NULL AUTO_INCREMENT,
  `branch` varchar(100) NOT NULL,
  PRIMARY KEY (`branchID`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `branch`
--

LOCK TABLES `branch` WRITE;
/*!40000 ALTER TABLE `branch` DISABLE KEYS */;
INSERT INTO `branch` VALUES (3,'branch1'),(4,'branch2'),(9,'Alabang'),(10,'Tagbilaran');
/*!40000 ALTER TABLE `branch` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `civilStatus`
--

DROP TABLE IF EXISTS `civilStatus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `civilStatus` (
  `civilStatus` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `civilStatus`
--

LOCK TABLES `civilStatus` WRITE;
/*!40000 ALTER TABLE `civilStatus` DISABLE KEYS */;
INSERT INTO `civilStatus` VALUES ('Single'),('Married');
/*!40000 ALTER TABLE `civilStatus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `diagnosticTimer`
--

DROP TABLE IF EXISTS `diagnosticTimer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `diagnosticTimer` (
  `time` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `diagnosticTimer`
--

LOCK TABLES `diagnosticTimer` WRITE;
/*!40000 ALTER TABLE `diagnosticTimer` DISABLE KEYS */;
INSERT INTO `diagnosticTimer` VALUES ('2000');
/*!40000 ALTER TABLE `diagnosticTimer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `floor`
--

DROP TABLE IF EXISTS `floor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `floor` (
  `floorNo` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(100) NOT NULL,
  `branch` varchar(100) NOT NULL,
  PRIMARY KEY (`floorNo`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `floor`
--

LOCK TABLES `floor` WRITE;
/*!40000 ALTER TABLE `floor` DISABLE KEYS */;
INSERT INTO `floor` VALUES (1,'ward floor','branch1'),(2,'medical ward','Tagbilaran'),(3,'ICU','Alabang'),(4,'Nursery','Alabang');
/*!40000 ALTER TABLE `floor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventory`
--

DROP TABLE IF EXISTS `inventory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inventory` (
  `inventoryCode` int(100) NOT NULL AUTO_INCREMENT,
  `description` varchar(100) NOT NULL,
  `genericName` varchar(100) NOT NULL,
  `preparation` varchar(100) NOT NULL,
  `unitcost` varchar(100) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `expiration` varchar(100) NOT NULL,
  `addedBy` varchar(100) NOT NULL,
  `dateAdded` varchar(100) NOT NULL,
  `timeAdded` varchar(100) NOT NULL,
  `inventoryLocation` varchar(100) NOT NULL,
  `inventoryType` varchar(100) NOT NULL,
  `branch` varchar(100) NOT NULL,
  `transition` varchar(100) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  PRIMARY KEY (`inventoryCode`)
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventory`
--

LOCK TABLES `inventory` WRITE;
/*!40000 ALTER TABLE `inventory` DISABLE KEYS */;
INSERT INTO `inventory` VALUES (6,'Alaxan 500','Ibuprofenz','mg','10.5','67','Sep_20_2012','ricky','Jan_02_2012','04:28:30','PHARMACY','medicine','branch1','Receiving',''),(7,'Alaxan 500','Ibuprofen','mg','10.5','1000','Dec_20_2012','ricky','Jan_02_2012','04:29:49','PHARMACY','medicine','Alabang','Pruchase Order','poNo1212'),(8,'Tuberculing Syringe 10cc','','','54.5','99','__','ricky','Jan_02_2012','08:28:43','CSR','supplies','branch1','',''),(9,'Adult Diaper','','','10.56','100','__','ricky','Jan_02_2012','08:35:51','PHARMACY','supplies','Alabang','',''),(10,'Diaper','','','10.11','100','__','ricky','Jan_23_2012','23:30:33','PHARMACY','supplies','Alabang','',''),(12,'Zantac','Zantac','','4.10','100','Jul_01_2012','ricky','Jan_25_2012','02:06:06','PHARMACY','medicine','branch1','',''),(13,'Bandage','','','40','100','__','ricky','Jan_25_2012','02:08:04','CSR','supplies','Alabang','',''),(14,'Gloves','','','30.10','100','__','ricky','Jan_26_2012','16:58:15','CSR','supplies','branch1','',''),(51,'Alaxan 500mg','Ibuprofen','','10.5','2','Dec_20_2012','rad1','Jan_31_2012','13:33:58','RADIOLOGY','medicine','branch1','Issued By CSR of Alabang / Issued Staff: alabang_csr','requesitionNo_49 / from inventoryCode of 7'),(52,'Solmux','Ferrous Sulfate','tab with ml','21.70','100','Jul_28_2012','ricky','Feb_12_2012','01:46:15','PHARMACY','medicine','branch1','Receiving',''),(53,'Alaxan 500','Ibuprofenz','','10.5','3','Sep_20_2012','ricky','Mar_07_2012','13:35:34','LABORATORY','medicine','branch1','Issued By CSR of branch1 / Issued Staff: ricky','requesitionNo_50 / from inventoryCode of 6'),(54,'fhfgh','','','10','100','__','ricky','May_26_2012','13:02:03','CSR','supplies','Tagbilaran','Pruchase Order','fh'),(55,'hfdhf','/?','cap','20','1000','Feb_02_2012','ricky','May_26_2012','13:02:53','CSR','supplies','Tagbilaran','Pruchase Order','hgjhgjh');
/*!40000 ALTER TABLE `inventory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventoryLocation`
--

DROP TABLE IF EXISTS `inventoryLocation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inventoryLocation` (
  `inventoryLocation` varchar(100) NOT NULL,
  PRIMARY KEY (`inventoryLocation`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventoryLocation`
--

LOCK TABLES `inventoryLocation` WRITE;
/*!40000 ALTER TABLE `inventoryLocation` DISABLE KEYS */;
INSERT INTO `inventoryLocation` VALUES ('CSR'),('PHARMACY');
/*!40000 ALTER TABLE `inventoryLocation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventoryManager`
--

DROP TABLE IF EXISTS `inventoryManager`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inventoryManager` (
  `verificationNo` int(11) NOT NULL AUTO_INCREMENT,
  `inventoryCode` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `quantityIssued` varchar(100) NOT NULL,
  `requestTo_department` varchar(100) NOT NULL,
  `requestTo_branch` varchar(100) NOT NULL,
  `requestingDepartment` varchar(100) NOT NULL,
  `requestingBranch` varchar(100) NOT NULL,
  `requestingUser` varchar(100) NOT NULL,
  `issuedBy` varchar(100) NOT NULL,
  `dateRequested` varchar(100) NOT NULL,
  `timeRequested` varchar(100) NOT NULL,
  `dateIssued` varchar(100) NOT NULL,
  `timeIssued` varchar(100) NOT NULL,
  `receivedBy` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`verificationNo`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventoryManager`
--

LOCK TABLES `inventoryManager` WRITE;
/*!40000 ALTER TABLE `inventoryManager` DISABLE KEYS */;
INSERT INTO `inventoryManager` VALUES (49,'7','Alaxan 500mg','2','2','CSR','Alabang','RADIOLOGY','branch1','rad1','alabang_csr','Jan_27_2012','02:16:14','Jan_30_2012','21:50:33','','Received'),(50,'6','Alaxan 500','3','3','CSR','branch1','LABORATORY','branch1\n','ricky','ricky','Mar_07_2012','13:27:55','Mar_07_2012','13:28:15','','Received');
/*!40000 ALTER TABLE `inventoryManager` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventoryTransition`
--

DROP TABLE IF EXISTS `inventoryTransition`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inventoryTransition` (
  `transitionID` int(11) NOT NULL AUTO_INCREMENT,
  `transition` varchar(100) NOT NULL,
  PRIMARY KEY (`transitionID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventoryTransition`
--

LOCK TABLES `inventoryTransition` WRITE;
/*!40000 ALTER TABLE `inventoryTransition` DISABLE KEYS */;
INSERT INTO `inventoryTransition` VALUES (1,'Receiving'),(2,'Pruchase Order');
/*!40000 ALTER TABLE `inventoryTransition` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ipaddress`
--

DROP TABLE IF EXISTS `ipaddress`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ipaddress` (
  `ipaddress` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ipaddress`
--

LOCK TABLES `ipaddress` WRITE;
/*!40000 ALTER TABLE `ipaddress` DISABLE KEYS */;
INSERT INTO `ipaddress` VALUES ('zynapse.site11.com');
/*!40000 ALTER TABLE `ipaddress` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `laboratoryResults`
--

DROP TABLE IF EXISTS `laboratoryResults`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `laboratoryResults` (
  `labNo` int(11) NOT NULL,
  `itemNo` varchar(100) NOT NULL,
  `registrationNo` varchar(100) NOT NULL,
  `dateReceived` varchar(100) NOT NULL,
  `dateReleased` varchar(100) NOT NULL,
  `pathologist` varchar(100) NOT NULL,
  `medTech` varchar(100) NOT NULL,
  `examinationType` varchar(100) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `Branch` varchar(100) NOT NULL,
  PRIMARY KEY (`labNo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `laboratoryResults`
--

LOCK TABLES `laboratoryResults` WRITE;
/*!40000 ALTER TABLE `laboratoryResults` DISABLE KEYS */;
INSERT INTO `laboratoryResults` VALUES (1,'219','351','Feb_01_2012','Feb_02_2012','Test Doctor','Test Medtech','Fecalysis','','Alabang'),(47,'220','351','Jan_01_2012','Jan_01_2012','TEST DOCTOR','lab2','','','branch1'),(55,'390','650','Apr_29_2012','Apr_29_2012','Juan Dela Cruz','lab2','','','branch1');
/*!40000 ALTER TABLE `laboratoryResults` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `laboratoryResultsValue`
--

DROP TABLE IF EXISTS `laboratoryResultsValue`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `laboratoryResultsValue` (
  `valuesNo` int(11) NOT NULL AUTO_INCREMENT,
  `labNo` varchar(100) NOT NULL,
  `examName` varchar(100) NOT NULL,
  `examResult` varchar(100) NOT NULL,
  `examFlag` varchar(100) NOT NULL,
  `examValue` varchar(100) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  PRIMARY KEY (`valuesNo`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `laboratoryResultsValue`
--

LOCK TABLES `laboratoryResultsValue` WRITE;
/*!40000 ALTER TABLE `laboratoryResultsValue` DISABLE KEYS */;
INSERT INTO `laboratoryResultsValue` VALUES (1,'1','Glocuse','302c*','C','70-110 mg/dL','too much high can cause of death , severe tenderness'),(2,'1','Sodium','149','H','135 - 148 mEg/L',''),(4,'47','Neutrophil (WBC)','19.0','L','5 - 10 x 10^9/L',''),(24,'47','Lymphocite (WBC)','0.73','L','0.55 - 0.70',''),(25,'47','Monocyte (WBC)','0.24','L','0.03 - 0.05',''),(26,'47','PLATELET','316.000','L','142,000 - 424,000 UL',''),(27,'47','RED BLOOD CELL','3.96','L','4.0 - 5.0 x 10^12/L',''),(28,'47','HEMOGLOBIN','113','L','120 - 160 g/L',''),(29,'47','HEMATOCRIT','0.34','L','0.37 - 0.47','');
/*!40000 ALTER TABLE `laboratoryResultsValue` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `module`
--

DROP TABLE IF EXISTS `module`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `module` (
  `moduleNo` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`moduleNo`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `module`
--

LOCK TABLES `module` WRITE;
/*!40000 ALTER TABLE `module` DISABLE KEYS */;
INSERT INTO `module` VALUES (1,'REGISTRATION','on'),(2,'BILLING','on'),(3,'NURSING','on'),(4,'DOCTOR','on'),(5,'LABORATORY','on'),(6,'RADIOLOGY','on'),(7,'PHARMACY','on'),(8,'CSR','on'),(9,'PATIENT','on'),(10,'CASHIER','on'),(11,'MAINTENANCE','on'),(12,'ADMIN','on'),(13,'ER','on'),(14,'OR/DR','on');
/*!40000 ALTER TABLE `module` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `patientBalance`
--

DROP TABLE IF EXISTS `patientBalance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `patientBalance` (
  `balanceNo` int(100) NOT NULL AUTO_INCREMENT,
  `itemNo` varchar(100) NOT NULL,
  `datePaid` varchar(100) NOT NULL,
  `timePaid` varchar(100) NOT NULL,
  `paidBy` varchar(100) NOT NULL,
  `amountPaid` varchar(100) NOT NULL,
  PRIMARY KEY (`balanceNo`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `patientBalance`
--

LOCK TABLES `patientBalance` WRITE;
/*!40000 ALTER TABLE `patientBalance` DISABLE KEYS */;
INSERT INTO `patientBalance` VALUES (1,'104','Jan_21_2012','14:18:02','ricky_cashier','800'),(2,'195','Jan_23_2012','14:41:44','ricky_cashier','250'),(3,'196','Jan_23_2012','14:58:42','ricky_cashier','500');
/*!40000 ALTER TABLE `patientBalance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `patientCharges`
--

DROP TABLE IF EXISTS `patientCharges`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `patientCharges` (
  `itemNo` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(100) NOT NULL,
  `registrationNo` varchar(100) NOT NULL,
  `chargesCode` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `sellingPrice` varchar(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `discount` varchar(100) NOT NULL,
  `total` varchar(100) NOT NULL,
  `cashUnpaid` varchar(100) NOT NULL,
  `phic` varchar(100) NOT NULL,
  `company` varchar(100) NOT NULL,
  `timeCharge` varchar(100) NOT NULL,
  `dateCharge` varchar(100) NOT NULL,
  `chargeBy` varchar(100) NOT NULL,
  `service` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `paidVia` varchar(100) NOT NULL,
  `cashPaid` varchar(100) NOT NULL,
  `batchNo` varchar(100) NOT NULL,
  `inventoryFrom` varchar(100) NOT NULL,
  `departmentStatus` varchar(100) NOT NULL,
  `departmentStatus_time` varchar(100) NOT NULL,
  `datePaid` varchar(100) NOT NULL,
  `timePaid` varchar(100) NOT NULL,
  `paidBy` varchar(100) NOT NULL,
  `branch` varchar(100) NOT NULL,
  PRIMARY KEY (`itemNo`)
) ENGINE=MyISAM AUTO_INCREMENT=743 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `patientCharges`
--

LOCK TABLES `patientCharges` WRITE;
/*!40000 ALTER TABLE `patientCharges` DISABLE KEYS */;
INSERT INTO `patientCharges` VALUES (42,'UNPAID','139','4','CBC',' 10.00',0,'0',' 10.00',' 10.00','0','0','11:00:00','Jan_01_2012','ricky','Examination','LABORATORY','Cash','0.00','124','','','','','','',''),(43,'UNPAID','157','4','CBC',' 10.00',0,'0',' 10.00',' 10.00','0','0','11:00:00','Jan_01_2012','ricky','Examination','LABORATORY','Cash','0.00','132','','','','','','',''),(44,'UNPAID','157','5','URINALYSIS',' 1000.00',0,'0',' 1000.00',' 1000.00','0','0','08:30:36','Jan_01_2012','ricky','Examination','LABORATORY','Cash','0.00','160','','','','','','',''),(49,'UNPAID','188','4','CBC',' 10.00',0,'0',' 10.00',' 10.00','0','0','10:44:13','Jan_01_2012','REGISTRATION','Examination','LABORATORY','Cash','0.00','undefined','','','','','','',''),(50,'UNPAID','189','4','CBC',' 10.00',0,'0',' 10.00',' 10.00','0','0','10:46:58','Jan_01_2012','REGISTRATION','Examination','LABORATORY','Cash','0.00','undefined','','','','','','',''),(55,'UNPAID','287','5','URINALYSIS',' 1000.00',0,'0',' 1000.00',' 1000.00','0','0','01:53:50','Jan_02_2012','ricky','Examination','LABORATORY','Cash','0.00','undefined','','','','','','',''),(59,'UNPAID','288','4','CBC',' 10.00',0,'0',' 10.00',' 10.00','0','0','02:10:33','Jan_02_2012','ricky','Examination','LABORATORY','Company','0.00','undefined','','','','','','',''),(60,'UNPAID','288','4','CBC',' 10.00',0,'0',' 10.00',' 10.00','0','0','02:10:33','Jan_02_2012','ricky','Examination','LABORATORY','Company','0.00','undefined','','','','','','',''),(70,'UNPAID','293','4','CBC',' 10.00',1,'0',' 10.00',' 10.00','0','0','10:07:28','Jan_02_2012','ricky','Examination','LABORATORY','Cash','0.00','undefined','','','','','','',''),(71,'UNPAID','293','5','URINALYSIS',' 1000.00',1,'0',' 1000.00',' 1000.00','0','0','10:07:31','Jan_02_2012','ricky','Examination','LABORATORY','Cash','0.00','undefined','','','','','','',''),(72,'UNPAID','293','6','Alaxan 500mg','13.65',1,'0','13.65','13.65','0','0','10:08:06','Jan_02_2012','ricky','Medication','MEDICINE','Cash','0','undefined','','','','','','',''),(87,'UNPAID','294','8','Tuberculing Syringe 10cc','54.5',1,'0','54.5','54.5','0','0','13:52:29','Jan_02_2012','ricky','Medication','MEDICINE','Cash','0','undefined','CSR','','','','','',''),(88,'UNPAID','294','8','Tuberculing Syringe 10cc','54.5',1,'0','54.5','54.5','0','0','13:53:30','Jan_02_2012','ricky','Others','SUPPLIES','Cash','0','undefined','CSR','','','','','',''),(92,'UNPAID','320','4','CBC',' 10.00',1,'0','10',' 10.00','0','0','11:22:25','Jan_03_2012','ricky','Examination','LABORATORY','Cash','0.00','undefined','none','','','','','',''),(97,'UNPAID','320','4','CBC',' 10.00',1,'0','10',' 10.00','0','0','11:48:23','Jan_03_2012','ricky','Examination','LABORATORY','Company','0.00','undefined','none','','','','','',''),(99,'UNPAID','320','5','URINALYSIS',' 1000.00',1,'0','1000',' 1000.00','0','0','23:54:02','Jan_06_2012','ricky_patient','Examination','LABORATORY','Cash','0.00','undefined','none','','','','','',''),(100,'UNPAID','320','8','Tuberculing Syringe 10cc','54.5',10,'0','545','54.5','0','0','00:02:26','Jan_06_2012','ricky_patient','Others','SUPPLIES','Cash','0','undefined','CSR','','','','','',''),(102,'UNPAID','320','5','URINALYSIS',' 1000.00',1,'0','1000',' 1000.00','0','0','02:22:17','Jan_06_2012','ricky_patient','Examination','LABORATORY','Cash','0.00','undefined','none','','','','','',''),(104,'PAID','294','5','URINALYSIS',' 1000.00',1,'0','1000','0','0','0','02:32:54','Jan_06_2012','ricky_patient','Examination','LABORATORY','Cash','200','undefined','none','','','Jan_08_2012','23:57:38','ricky_cashier',''),(105,'UNPAID','139','8','CHEST PA','200.00',1,'0','200','200.00','0','0','23:49:40','Jan_07_2012','ricky_patient','Examination','RADIOLOGY','Cash','0.00','undefined','none','remittedBy_ricky','','','','',''),(107,'UNPAID','320','4','CBC',' 10.00',1,'0','10',' 10.00','0','0','16:05:04','Jan_08_2012','ricky_patient','Examination','LABORATORY','Cash','0.00','undefined','none','','','','','',''),(110,'UNPAID','320','6','Alaxan 500mg','13.65',2,'0','27.3','13.65','0','0','16:40:02','Jan_08_2012','ricky_patient','Medication','MEDICINE','Cash','0','undefined','PHARMACY','','','','','',''),(114,'BALANCE','294','4','CBC',' 10.00',1,'0','10','8.65','0','0','01:47:26','Jan_08_2012','ricky_patient','Examination','LABORATORY','Cash','1.35','undefined','none','','','Feb_08_2012','01:11:12','ricky_cashier','branch1'),(115,'PAID','294','6','Alaxan 500mg','13.65',2,'0','27.3','0','0','0','00:58:24','Jan_08_2012','ricky_patient','Medication','MEDICINE','Cash','13.65','undefined','PHARMACY','','','Feb_08_2012','01:11:12','ricky_cashier',''),(124,'PAID','352','4','CBC',' 10.00',1,'0','10','0','0','0','00:50:34','Jan_18_2012','Registrar','Examination','LABORATORY','Cash','10','undefined','none','remittedBy_lab2','','Jan_18_2012','00:52:42','cashier2','Alabang'),(125,'PAID','352','6','CBC W/ PC',' 1000.00',1,'0','1000','0','0','0','01:53:13','Jan_18_2012','Registrar','Examination','LABORATORY','Cash','1000','undefined','none','','','Jan_18_2012','01:53:43','cashier2','branch1'),(126,'PAID','353','6','CBC W/ PC',' 1000.00',1,'0','1000','0','0','0','02:13:46','Jan_18_2012','register3','Examination','LABORATORY','Cash','1000','undefined','none','remittedBy_lab3','','Jan_18_2012','02:15:03','cashier3',''),(146,'PAID','351','6','Alaxan 500mg','13.65',1,'0','13.65','0','13.65','0','15:24:00','Jan_22_2012','ricky_patient','Medication','MEDICINE','Cash','27.3','undefined','PHARMACY','dispensedBy_ricky','','Jan_22_2012','15:24:04','ricky_cashier','Alabang'),(216,'PAID','351','8','Tuberculing Syringe 10cc','54.5',1,'0','54.5','0','54.5','0','23:41:34','Jan_23_2012','ricky_patient','Others','SUPPLIES','Cash','54.5','undefined','CSR','dispensedBy_ricky','','Jan_23_2012','23:41:44','ricky_cashier','Alabang'),(218,'APPROVED','351','8','TEST DOCTOR','100/40',1,'0','100','0','100','0','13:13:40','Jan_24_2012','ricky_patient','Consultation','PROFESSIONAL FEE','Company','0.00','undefined','none','','','__','::','','Alabang'),(220,'UNPAID','351','4','CBC','  20',1,'0','20','0','20','0','01:02:31','Jan_25_2012','ricky_patient','Examination','LABORATORY','Cash','0.00','undefined','none','remittedBy_ricky','04:22:48','__','::','','branch1'),(221,'UNPAID','351','8','CHEST PA','200.00',1,'0','200','0','200','0','12:24:47','Feb_05_2012','ricky_patient','Examination','RADIOLOGY','Cash','0.00','undefined','none','','','__','::','','branch1'),(229,'UNPAID','351','4','CBC',' 20',3,'0','60','0','60','0','22:27:01','Feb_06_2012','ricky_patient','Examination','LABORATORY','Cash','0.00','undefined','none','','','__','::','','branch1'),(231,'PAID','351','6','Alaxan 500mg','13.65',1,'0','13.65','0','13.65','0','22:27:07','Feb_06_2012','ricky_patient','Medication','MEDICINE','Cash','13.65','undefined','PHARMACY','dispensedBy_ricky','22:36:43','Feb_06_2012','22:36:38','ricky_cashier','branch1'),(235,'PAID','351','12','Juan Dela Cruz','400/280',1,'0','400','0','400','0','14:54:17','Feb_07_2012','ricky_patient','Consultation','PROFESSIONAL FEE','Cash','400','undefined','none','doneBy_Juan Dela Cruz','02:06:40','Feb_07_2012','14:54:40','ricky_cashier','branch1'),(237,'UNPAID','351','4','CBC','  20',1,'0','20','0','20','0','21:58:11','Feb_07_2012','ricky_patient','Examination','LABORATORY','Cash','0.00','undefined','none','','','__','::','','branch1'),(251,'UNPAID','352','6','CBC W/ PC',' 1000.00',1,'0','1000','1000','0','0','23:16:31','Jan_07_2012','ricky_patient','Examination','LABORATORY','Cash','0.00','undefined','none','','','__','::','','branch1'),(252,'UNPAID','352','6','CBC W/ PC',' 1000.00',1,'0','1000','1000','0','0','23:40:35','Feb_07_2012','ricky_patient','Examination','LABORATORY','Cash','0.00','undefined','none','','','__','::','','branch1'),(253,'PAID','351','6','CBC W/ PC',' 1000.00',1,'0','1000','0','1000','0','01:42:24','Jan_08_2012','ricky_patient','Examination','LABORATORY','Cash','1000','undefined','none','','','Feb_08_2012','00:35:40','ricky_cashier','branch1'),(254,'PAID','351','6','CBC W/ PC',' 1000.00',1,'0','1000','0','1000','0','00:06:44','Jan_08_2012','ricky_patient','Examination','LABORATORY','Cash','1000','undefined','none','','','Feb_08_2012','00:34:59','ricky_cashier','branch1'),(255,'UNPAID','294','6','CBC W/ PC',' 1000.00',1,'0','1000','1000','0','0','01:08:38','Feb_08_2012','ricky_patient','Examination','LABORATORY','Cash','0.00','undefined','none','','','','','','Alabang'),(256,'APPROVED','294','6','CBC W/ PC',' 1000.00',1,'0','1000','0','0','1000','01:48:52','Jan_08_2012','ricky_patient','Examination','LABORATORY','Company','0.00','undefined','none','','','__','::','','branch1'),(263,'UNPAID','351','12','Juan Dela Cruz','400/280',1,'80','320','0','320','0','15:16:24','Feb_09_2012','ricky_patient','Consultation','PROFESSIONAL FEE','Cash','0.00','undefined','none','','','','','','branch1'),(275,'UNPAID','351','13','TEST DOCTOR','350/140',1,'0','350','0','350','0','18:19:30','Feb_11_2012','ricky_patient','Consultation','PROFESSIONAL FEE','Cash','0.00','undefined','none','','','','','','branch1'),(276,'UNPAID','351','52','Solmux','28.21',2,'0','56.42','0','56.42','0','03:00:48','Feb_12_2012','ricky_patient','Medication','MEDICINE','Cash','0','undefined','PHARMACY','','','__','::','','branch1'),(279,'UNPAID','351','52','Solmux','28.21',5,'0','141.05','0','141.05','0','15:17:43','Feb_12_2012','ricky_patient','Medication','MEDICINE','Cash','0','undefined','PHARMACY','','','__','::','','branch1'),(280,'UNPAID','351','14','Laxa, Genesis','350/140',1,'0','350','0','350','0','15:32:30','Feb_12_2012','ricky_patient','Consultation','PROFESSIONAL FEE','Cash','0.00','undefined','none','','','__','::','','branch1'),(281,'UNPAID','351','52','Solmux','28.21',3,'0','84.63','0','84.63','0','04:35:37','Feb_13_2012','ricky_patient','Medication','MEDICINE','Cash','0','undefined','PHARMACY','','','__','::','','branch1'),(282,'UNPAID','351','6','Alaxan 500','13.65',1,'0','13.65','0','13.65','0','04:42:03','Feb_13_2012','ricky_patient','Medication','MEDICINE','Cash','0','undefined','PHARMACY','','','__','::','','branch1'),(283,'UNPAID','351','6','Alaxan 500','13.65',1,'0','13.65','0','13.65','0','04:42:07','Feb_13_2012','ricky_patient','Medication','MEDICINE','Cash','0','undefined','PHARMACY','','','__','::','','branch1'),(284,'UNPAID','365','4','CBC','  20',1,'0','20','20','0','0','16:24:30','Feb_14_2012','ricky_patient','Examination','LABORATORY','Cash','0.00','undefined','none','','','__','::','','branch2'),(285,'UNPAID','365','8','CHEST PA','200.00',1,'0','200','0','0','200','16:24:33','Feb_14_2012','ricky_patient','Examination','RADIOLOGY','Cash','0.00','undefined','none','','','__','::','','branch2'),(313,'UNPAID','351','6','CBC W/ PC',' 1000.00',1,'0','1000','0','1000','0','03:39:13','Feb_17_2012','ricky_patient','Examination','LABORATORY','Cash','0.00','undefined','none','','','','','','branch1'),(314,'UNPAID','351','6','CBC W/ PC',' 1000.00',1,'0','1000','0','1000','0','03:39:15','Feb_17_2012','ricky_patient','Examination','LABORATORY','Cash','0.00','undefined','none','','','','','','branch1'),(315,'UNPAID','351','6','CBC W/ PC',' 1000.00',1,'0','1000','0','1000','0','03:39:18','Feb_17_2012','ricky_patient','Examination','LABORATORY','Cash','0.00','undefined','none','','','','','','branch1'),(316,'UNPAID','351','6','CBC W/ PC',' 1000.00',1,'0','1000','0','1000','0','03:39:19','Feb_17_2012','ricky_patient','Examination','LABORATORY','Cash','0.00','undefined','none','','','','','','branch1'),(317,'UNPAID','351','6','CBC W/ PC',' 1000.00',1,'0','1000','0','1000','0','16:32:07','Feb_17_2012','ricky_patient','Examination','LABORATORY','Cash','0.00','undefined','none','','','','','','branch1'),(321,'UNPAID','294','16','TEST DOCTOR','350/140',1,'0','350','350','0','0','14:51:55','Feb_21_2012','nursing1','Consultation','PROFESSIONAL FEE','Cash','0.00','undefined','none','','','','','','branch1'),(322,'UNPAID','351','16','TEST DOCTOR','2000/2000',1,'0','2000','0','2000','0','15:18:50','Feb_21_2012','nursing1','Admitting','PROFESSIONAL FEE','Cash','0.00','undefined','none','','','','','','branch1'),(337,'UNPAID','351','4','CBC',' 30',1,'0','30','0','30','0','22:01:13','Feb_22_2012','ricky_patient','Examination','LABORATORY','Cash','0.00','4149','none','','','','','','branch1'),(338,'UNPAID','351','8','CHEST PA',' 0.00',1,'0','0','0','0','0','22:11:37','Feb_22_2012','ricky_patient','Examination','RADIOLOGY','Cash','0.00','4358','none','','','','','','branch1'),(370,'UNPAID','351','6','CBC W/ PC',' 1000.00',1,'0','1000','0','1000','0','23:54:28','Feb_22_2012','ricky_patient','Examination','LABORATORY','Cash','0.00','5170','none','','','','','','branch1'),(372,'UNPAID','351','4','CBC','    30',1,'0','30','0','30','0','00:49:11','Mar_01_2012','ricky_patient','Examination','LABORATORY','Cash','0.00','17510','none','','','','','','branch1'),(376,'UNPAID','571','6','Alaxan 500','13.65',1,'0','13.65','13.65','0','0','22:04:27','Mar_01_2012','ricky_patient','Medication','MEDICINE','Cash','0','19246','PHARMACY','','','','','','branch1'),(387,'PAID','351','4','CBC','    30',1,'0','30','0','30','0','13:39:16','Mar_08_2012','ricky_patient','Examination','LABORATORY','Credit Card','30','28635','none','','','Mar_08_2012','13:55:18','ricky_cashier','branch1'),(724,'UNPAID','635','313_SOLOWARD','313_SOLOWARD','350',1,'0','350','350','0','0','10:15:39','May_30_2012','register','Confinement','Room And Board','Cash','0','','','','','','','','branch1'),(390,'UNPAID','650','4','CBC','     20',1,'0','20','20','0','0','15:41:09','Apr_28_2012','branch','Examination','LABORATORY','Cash','0.00','37404','none','','','__','::','','branch1'),(391,'UNPAID','650','5','URINALYSIS',' 1000.00',1,'0','1000','1000','0','0','15:41:28','Apr_28_2012','branch','Examination','LABORATORY','Cash','0.00','37404','none','','','','','','branch1'),(392,'UNPAID','650','4','CBC','     20',1,'0','20','20','0','0','15:46:33','Apr_28_2012','<?php echo $username; ?>','Examination','LABORATORY','Cash','0.00','37526','none','','','','','','branch1'),(393,'UNPAID','650','8','CHEST PA','200.00',1,'0','200','200','0','0','14:19:58','Apr_29_2012','ricky_patient','Examination','RADIOLOGY','Cash','0.00','1464','none','','','','','','branch1'),(395,'UNPAID','365','16','TEST DOCTOR','350/140',1,'0','350','350','0','0','11:03:22','May_28_2012','ricky_patient','Consultation','PROFESSIONAL FEE','Cash','0.00','37496','none','','','','','','branch1'),(396,'UNPAID','634','16','TEST DOCTOR','350/140',1,'0','350','350','0','0','09:32:17','May_29_2012','register','Consultation','PROFESSIONAL FEE','Cash','0.00','37600','none','','','','','','branch2'),(725,'UNPAID','635','6','Alaxan 500','13.65',3,'8.19','32.76','32.76','0','0','10:16:03','May_29_2012','register','Medication','MEDICINE','Cash','0','37661','PHARMACY','','','','','','branch1'),(726,'UNPAID','635','52','Solmux','28.21',5,'28.21','112.84','112.84','0','0','10:16:29','May_29_2012','register','Medication','MEDICINE','Cash','0','37661','PHARMACY','','','','','','branch1'),(727,'UNPAID','635','12','Zantac','5.33',2,'2.132','8.528','8.528','0','0','10:16:49','May_29_2012','register','Medication','MEDICINE','Cash','0','37661','PHARMACY','','','','','','branch1'),(728,'UNPAID','635','6','CBC W/ PC',' 1000.00',1,'200','800','800','0','0','10:17:37','May_29_2012','register','Examination','LABORATORY','Cash','0.00','37686','none','','','','','','branch1'),(729,'UNPAID','635','4','CBC','    10',1,'2','8','8','0','0','10:17:51','May_29_2012','register','Examination','LABORATORY','Cash','0.00','37686','none','','','','','','branch1'),(730,'UNPAID','635','8','CHEST PA',' 0.00',1,'0','0','0','0','0','10:18:04','May_29_2012','register','Examination','RADIOLOGY','Cash','0.00','37686','none','','','','','','branch1'),(731,'UNPAID','635','4','CBC','    10',1,'0','10','10','0','0','14:55:41','May_30_2012','billing1','Examination','LABORATORY','Cash','0.00','37749','none','','','','','','branch1'),(732,'UNPAID','635','5','URINALYSIS',' 1000.00',1,'0','1000','1000','0','0','14:55:57','May_30_2012','billing1','Examination','LABORATORY','Cash','0.00','37749','none','','','','','','branch1'),(733,'UNPAID','635','6','Alaxan 500','13.65',1,'0','13.65','13.65','0','0','14:56:09','May_30_2012','billing1','Medication','MEDICINE','Cash','0','37749','PHARMACY','','','','','','branch1'),(734,'UNPAID','635','12','Zantac','5.33',1,'0','5.33','5.33','0','0','14:56:19','May_30_2012','billing1','Medication','MEDICINE','Cash','0','37749','PHARMACY','','','','','','branch1'),(735,'UNPAID','635','8','Tuberculing Syringe 10cc','54.5',1,'0','54.5','54.5','0','0','14:56:48','May_30_2012','billing1','Others','SUPPLIES','Cash','0','37749','CSR','','','','','','branch1'),(736,'UNPAID','635','16','TEST DOCTOR','350/140',1,'0','350','350','0','0','14:57:13','May_30_2012','billing1','Consultation','PROFESSIONAL FEE','Cash','0.00','37749','none','','','','','','branch1'),(737,'','','','','',1,'0','0','0','0','0','','Sep_20_2012','','','','','','','','','','','','',''),(738,'UNPAID','680','16','TEST DOCTOR','350/140',1,'0','350','350','0','0','03:40:06','Nov_16_2012','<?php echo $username; ?>','Consultation','PROFESSIONAL FEE','Cash','0.00','38137','none','','','','','','Alabang'),(739,'UNPAID','696','103_WARD','103_WARD','120',1,'0','120','120','0','0','07:35:08','Apr_09_2013','register','Confinement','Room And Board','Cash','0','','','','','','','','branch2'),(742,'UNPAID','696','4','CBC','    20',1,'0','20','20','0','0','07:42:22','Apr_08_2013','register','Examination','LABORATORY','Cash','0.00','38410','none','','','','','','branch2');
/*!40000 ALTER TABLE `patientCharges` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `patientCreditLimit`
--

DROP TABLE IF EXISTS `patientCreditLimit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `patientCreditLimit` (
  `limitNo` int(11) NOT NULL AUTO_INCREMENT,
  `registrationNo` varchar(100) NOT NULL,
  `limitTo` varchar(100) NOT NULL,
  `limitVia` varchar(100) NOT NULL,
  `amountLimit` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  PRIMARY KEY (`limitNo`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `patientCreditLimit`
--

LOCK TABLES `patientCreditLimit` WRITE;
/*!40000 ALTER TABLE `patientCreditLimit` DISABLE KEYS */;
INSERT INTO `patientCreditLimit` VALUES (5,'351','SUPPLIES','phic','2000','ricky_patient'),(6,'351','LABORATORY','phic','2000','ricky_patient'),(14,'365','PATIENT','cashUnpaid','1000','ricky_patient'),(15,'351','PATIENT','cashUnpaid','5500','ricky_patient');
/*!40000 ALTER TABLE `patientCreditLimit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `patientICD`
--

DROP TABLE IF EXISTS `patientICD`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `patientICD` (
  `icdNo` int(11) NOT NULL AUTO_INCREMENT,
  `registrationNo` varchar(100) NOT NULL,
  `icdCode` varchar(100) NOT NULL,
  `diagnosis` varchar(100) NOT NULL,
  PRIMARY KEY (`icdNo`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `patientICD`
--

LOCK TABLES `patientICD` WRITE;
/*!40000 ALTER TABLE `patientICD` DISABLE KEYS */;
INSERT INTO `patientICD` VALUES (1,'351','A15.0','Pulmonary Tuberculosis Class 2 by Sputum Confirmationz'),(2,'351','S00.8','Abrasion, Chin'),(3,'351','S20.8','Abrasions, Chest wall'),(4,'351','A16.0','Pulmonary Tuberculosis Class 2 by X-ray confirmation'),(5,'351','N39.0','Pyuria'),(6,'351','R10.4','Abdominal Colic'),(8,'351','R21','Rash');
/*!40000 ALTER TABLE `patientICD` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `patientNotes`
--

DROP TABLE IF EXISTS `patientNotes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `patientNotes` (
  `noteNo` int(11) NOT NULL AUTO_INCREMENT,
  `registrationNo` varchar(100) NOT NULL,
  `noteType` varchar(100) NOT NULL,
  `noteBy` varchar(100) NOT NULL,
  `noteMessage` varchar(200) NOT NULL,
  `date` varchar(100) NOT NULL,
  `time` varchar(100) NOT NULL,
  PRIMARY KEY (`noteNo`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `patientNotes`
--

LOCK TABLES `patientNotes` WRITE;
/*!40000 ALTER TABLE `patientNotes` DISABLE KEYS */;
INSERT INTO `patientNotes` VALUES (4,'351','Doctors Order','ricky_patient','this patient should be admitted for observances for many times\r\n','Apr_09_2012','02:19:58'),(5,'351','doctorsOrder','testdoc','\r\ntrying to revive this patient','Apr_09_2012','02:23:15'),(6,'351','Doctors Order','testdoc','injured patientz\r\n','Apr_09_2012','02:24:05'),(20,'','guest','guest',' ','Apr 28, 2012','16:41:46'),(16,'','guest','guest',' if anyone has a question regarding this system you can contact me.....','Apr 24, 2012','18:25:47'),(17,'351','Comments','ricky_patient','\r\nthis is only  a trial to the patient','Apr_24_2012','18:35:31'),(19,'','guest','guest',' username:ricky password:ricky   ...... view all user in 8.Maintenance > Masterfile > User  ... u can register ur own... click Home on the upper left of the screen to signout to ur current module','Apr 24, 2012','01:29:00'),(21,'','guest','guest',' hero\r\n','May 19, 2012','22:13:48'),(22,'','guest','guest',' where is the sql database?','May 26, 2012','13:20:23'),(23,'','guest','guest','the database was hosted in this demo site once ur connected it will automically call the database from here to your local server.','May 26, 2012','05:18:12'),(24,'','guest','guest',' ','Jun 01, 2012','17:45:09'),(25,'','guest','guest',' h','Jul 18, 2012','10:40:31'),(26,'','guest','guest',' aha','Jul 23, 2012','12:25:11'),(27,'','guest','guest',' ','Jul 27, 2012','17:25:33'),(28,'','guest','guest',' how can i get the database','Aug 15, 2012','16:20:53'),(29,'','guest','guest',' how can i get the data base so that ican instal it in wamp','Aug 15, 2012','16:22:07'),(30,'','guest','guest',' lol','Aug 15, 2012','16:41:52'),(31,'','guest','guest',' ','Aug 25, 2012','01:31:32'),(32,'','guest','guest',' provide the static ip of your server then i\\\'ll be setting up the system in your server. you gonna use the database of this site','Aug 25, 2012','04:29:02'),(33,'','guest','guest',' where is ur database ? and I also see that there is no \r\ninclude(\\\"../myDatabase.php\\\"); please send ur answer in my email sonadas899@yahoo.in or prasanta_ghoshal@rediffmail.com','Sep 20, 2012','12:29:31'),(34,'','guest','guest',' ','Sep 20, 2012','22:54:44'),(35,'','guest','guest',' i upload an updated zip file to the sourcecodester.. just download it again it\\\'s now complete...','Sep 20, 2012','22:55:37'),(36,'','guest','guest',' xcd','Nov 24, 2012','18:54:27'),(37,'','guest','guest',' asdas','Jan 11, 2013','11:52:40');
/*!40000 ALTER TABLE `patientNotes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `patientPayment`
--

DROP TABLE IF EXISTS `patientPayment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `patientPayment` (
  `paymentNo` int(11) NOT NULL AUTO_INCREMENT,
  `registrationNo` varchar(100) NOT NULL,
  `amountPaid` varchar(100) NOT NULL,
  `datePaid` varchar(100) NOT NULL,
  `timePaid` varchar(100) NOT NULL,
  `paidBy` varchar(100) NOT NULL,
  `paymentFor` varchar(100) NOT NULL,
  PRIMARY KEY (`paymentNo`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `patientPayment`
--

LOCK TABLES `patientPayment` WRITE;
/*!40000 ALTER TABLE `patientPayment` DISABLE KEYS */;
INSERT INTO `patientPayment` VALUES (3,'351','1000','Feb_16_2012','04:25:57','ricky_patient','PATIENT'),(8,'351','1000','Feb_17_2012','02:53:07','ricky_patient','PATIENT'),(9,'351','1000','Feb_17_2012','16:51:52','<?php echo $username; ?>','MEDICINE'),(10,'351','230','Oct_02_2012','20:09:27','ricky_patient','PATIENT'),(11,'680','350','Nov_16_2012','04:47:03','<?php echo $username; ?>','PATIENT');
/*!40000 ALTER TABLE `patientPayment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `patientRecord`
--

DROP TABLE IF EXISTS `patientRecord`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `patientRecord` (
  `patientNo` int(11) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `middleName` varchar(100) NOT NULL,
  `completeName` varchar(100) NOT NULL,
  `Birthdate` varchar(100) NOT NULL,
  `Age` varchar(10) NOT NULL,
  `Gender` varchar(100) NOT NULL,
  `Senior` varchar(100) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `contactNo` varchar(100) NOT NULL,
  `PHIC` varchar(30) NOT NULL,
  `phicType` varchar(100) NOT NULL,
  `civilStatus` varchar(100) NOT NULL,
  PRIMARY KEY (`patientNo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `patientRecord`
--

LOCK TABLES `patientRecord` WRITE;
/*!40000 ALTER TABLE `patientRecord` DISABLE KEYS */;
INSERT INTO `patientRecord` VALUES (125,'dela cruz','juan','ewan','dela cruz juan ewan','Jan_2_1992','19','male','no','quezon city','09282663758','no','','Single'),(136,'Osit','Ricardo','Andayan','Osit Ricardo Andayan','Jan_2_1992','19','male','no','Quezon City','09282663758','no','','Single'),(141,'Vicez','Gandaz','Kabayoz','Vicez Gandaz Kabayoz','Jan_3_1992','21','male','NO','129 Sct.Dr Lazcano St, Brgy Sacred Heart Kamuning Quezon City','092826637581','NO','','Single'),(142,'Piolo','Pascual','Baklita','Piolo Pascual Baklita','Jan_2_1992','20','male','no','Muntinlupa City','09282663758','no','','Single'),(143,'Snow','White','dwarfs','Snow White dwarfs','Sep_2_1992','20','male','NO','America','09282663758','YES','','Single'),(153,'Captain','Barbell','DimagibAz','Captain Barbell DimagibAz','Jan_2_1992','20','male','NO','Quezon City','123456788','YES','SSS','Single'),(172,'Snow','White','dwarfs','Snow White dwarfs','Sep_2_1992','20','female','NO','America','09282663758','NO','','Single'),(174,'lucero','maricard','andayan','lucero maricard andayan','Apr_3_2004','8','female','no','Quezon City','09282663758','no','','Single'),(175,'Vice','Ganda','Kabayo','Vice Ganda Kabayo','Jan_2_1992','20','female','NO','Quezon City','09282663758','NO','','Single'),(176,'Piolo','Pascual','Baklita','Piolo Pascual Baklita','Jan_2_1992','20','female','no','Muntinlupa City','09282663758','no','','Single'),(273,'Snow','White','dwarfs','Snow White dwarfs','Sep_2_1992','20','female','no','America','09282663758','no','','Single'),(274,'Snow','White','dwarfs','Snow White dwarfs','Sep_2_1992','20','female','no','America','09282663758','no','','Single'),(275,'Piolo','Pascual','Baklita','Piolo Pascual Baklita','Jan_2_1992','20','male','no','Quezon City','09282663758','no','','Single'),(296,'Pedro','San jose','Ewan','Pedro San jose Ewan','Jan_2_1992','20','male','no','Quezon City','09282663758','no','','Single'),(303,'Lucero','Ariel','Andayan','Lucero Ariel Andayan','Jun_5_2002','10','male','NO','Quezon City','Contact No#','YES','','Single'),(320,'Test','test','test','Test test test','Jan_1_1992','20','female','NO','quezon city','Contact No#','YES','','Single'),(321,'test','test','test','test test test','Jan_1_1992','20','male','NO','quezon city','Contact No#','NO','','Single'),(327,'test','test','test','test test test','Jan_1_Year','2012','male','NO','ADDRESS','232','NO','','Single'),(329,'test','test','test','test test test','Jan_1_1990','22','male','NO','ADDRESS','232','NO','','Single'),(340,'test','FIRST NAME','MIDDLE NAME','test FIRST NAME MIDDLE NAME','Jan_1_1990','22','male','NO','ADDRESS','Contact No#','NO','','Single'),(341,'shokot','adurubale','jolibbe','shokot adurubale jolibbe','Jan_1_122','1890','female','NO','Las pin','09282663758','YES','','Single'),(342,'LAST NAME','FIRST NAME','MIDDLE NAME','LAST NAME FIRST NAME MIDDLE NAME','Jan_1_121212','-119200','male','NO','ADDRESS','Contact No#','NO','','Single'),(343,'z','FIRST NAME','MIDDLE NAME','z FIRST NAME MIDDLE NAME','Jan_1_1213','799','female','NO','ADDRESS','Contact No#','YES','Pensioner','Single'),(349,'zzzzzz','FIRST NAME','MIDDLE NAME','zzzzzz FIRST NAME MIDDLE NAME','Jan_1_12121','-10109','male','NO','ADDRESS','Contact No#','NO','','Single'),(361,'DEMITASSE','CAFE','T','DEMITASSE CAFE T','Jan_1_1980','32','male','NO','TORRESS','123456','NO','Individual','Single'),(364,'sandig','san','s','sandig san s','Jan_1_1970','42','male','NO','tacurong','0909090909','NO','SSS','Married'),(368,'LIM','SARAH','ROA','LIM SARAH ROA','Jan_3_1960','52','female','NO','CATBALOGAN, SAMAR','0989987887','NO','','Single'),(369,'gua','ai','di','gua ai di','May_1_1940','72','male','YES','manila zoo','023213456','YES','Pensioner','Seperated'),(408,'ABA','AGd','sakdfs','ABA AGd sakdfs','Jan_1_1922','90','male','YES','No9','070532324234','YES','Individual','Single'),(413,'Muhammad','Gibran','Alaiman','Muhammad Gibran Alaiman','Jan_1_2007','5','male','NO','Indonesia','11111','NO','Individual','Single'),(429,'Osit','Ricardo','Andayan','Osit Ricardo Andayan','Jan_2_1992','21','male','NO','Q.C','09282663758','YES','SSS','Single');
/*!40000 ALTER TABLE `patientRecord` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `percentage`
--

DROP TABLE IF EXISTS `percentage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `percentage` (
  `percentageNo` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(100) NOT NULL,
  `percentageType` varchar(100) NOT NULL,
  `percentageAmount` varchar(100) NOT NULL,
  PRIMARY KEY (`percentageNo`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `percentage`
--

LOCK TABLES `percentage` WRITE;
/*!40000 ALTER TABLE `percentage` DISABLE KEYS */;
INSERT INTO `percentage` VALUES (1,'the unitcost of medicine will multiplied to this percentagez','medicine','.30'),(2,'senior  discount','senior','.20');
/*!40000 ALTER TABLE `percentage` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phicType`
--

DROP TABLE IF EXISTS `phicType`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phicType` (
  `typeNo` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(100) NOT NULL,
  PRIMARY KEY (`typeNo`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phicType`
--

LOCK TABLES `phicType` WRITE;
/*!40000 ALTER TABLE `phicType` DISABLE KEYS */;
INSERT INTO `phicType` VALUES (1,'SSS'),(2,'GSIS'),(3,'Individual'),(4,'Pensioner');
/*!40000 ALTER TABLE `phicType` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `radiologyResults`
--

DROP TABLE IF EXISTS `radiologyResults`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `radiologyResults` (
  `radioNo` int(11) NOT NULL AUTO_INCREMENT,
  `itemNo` varchar(100) NOT NULL,
  `registrationNo` varchar(100) NOT NULL,
  `radiologist` varchar(100) NOT NULL,
  `medTech` varchar(100) NOT NULL,
  `dateReceived` varchar(100) NOT NULL,
  `dateReleased` varchar(100) NOT NULL,
  `impression` varchar(200) NOT NULL,
  `branch` varchar(100) NOT NULL,
  PRIMARY KEY (`radioNo`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `radiologyResults`
--

LOCK TABLES `radiologyResults` WRITE;
/*!40000 ALTER TABLE `radiologyResults` DISABLE KEYS */;
INSERT INTO `radiologyResults` VALUES (20,'221','351','TEST DOCTOR','rad1','Jan_01_2012','Feb_01_2012','WRITE YOUR RADIOLOGY REPORT HERE','branch1');
/*!40000 ALTER TABLE `radiologyResults` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registeredUser`
--

DROP TABLE IF EXISTS `registeredUser`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `registeredUser` (
  `employeeID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `module` varchar(100) NOT NULL,
  `branch` varchar(100) NOT NULL,
  PRIMARY KEY (`employeeID`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registeredUser`
--

LOCK TABLES `registeredUser` WRITE;
/*!40000 ALTER TABLE `registeredUser` DISABLE KEYS */;
INSERT INTO `registeredUser` VALUES (1,'ricky','ricky','LABORATORY','branch1\n'),(2,'ricky','ricky','RADIOLOGY','branch2'),(3,'ricky','ricky','MAINTENANCE','branch1'),(4,'ricky','register','REGISTRATION','branch1'),(5,'Registrar','123','REGISTRATION','branch2'),(6,'ricky_patient','ricky','PATIENT','branch2'),(8,'ricky_cashier','ricky','CASHIER','branch1'),(10,'ricky','ricky','PHARMACY','branch1'),(11,'ricky','ricky','CSR','branch1'),(12,'branch','branch','REGISTRATION','branch1'),(13,'lab2','lab2','LABORATORY','branch2'),(14,'rad1','rad1','RADIOLOGY','branch1'),(15,'pharma2','pharma2','PHARMACY','branch2'),(26,'Francis','chanlook','PHARMACY','Tagbilaran'),(19,'register3','register3','REGISTRATION','Alabang'),(20,'cashier3','cashier3','CASHIER','Alabang'),(21,'lab3','lab3','LABORATORY','Alabang'),(22,'alabang_csr','alabang_csr','CSR','Alabang'),(23,'billing1','billing1','BILLING','branch1'),(24,'nursing1','nursing1','NURSING','branch1'),(25,'register','123','REGISTRATION','branch1'),(27,'Francis','chanlook','CASHIER','Tagbilaran'),(28,'ricky','ricky','ADMIN','Tagbilaran'),(29,'<h1>Hello Ricky</h1>','ricky','CASHIER','Alabang');
/*!40000 ALTER TABLE `registeredUser` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registrationDetails`
--

DROP TABLE IF EXISTS `registrationDetails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `registrationDetails` (
  `patientNo` varchar(100) NOT NULL,
  `registrationNo` varchar(200) NOT NULL,
  `bloodPressure` varchar(100) NOT NULL,
  `temperature` varchar(100) NOT NULL,
  `height` varchar(100) NOT NULL,
  `weight` varchar(100) NOT NULL,
  `Company` varchar(100) NOT NULL,
  `initialDiagnosis` varchar(100) NOT NULL,
  `finalDiagnosis` varchar(100) NOT NULL,
  `dateRegistered` varchar(100) NOT NULL,
  `dateUnregistered` varchar(100) NOT NULL,
  `timeRegistered` varchar(100) NOT NULL,
  `timeUnregistered` varchar(100) NOT NULL,
  `branch` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `room` varchar(100) NOT NULL,
  `PIN` varchar(100) NOT NULL,
  `registeredBy` varchar(100) NOT NULL,
  PRIMARY KEY (`registrationNo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registrationDetails`
--

LOCK TABLES `registrationDetails` WRITE;
/*!40000 ALTER TABLE `registrationDetails` DISABLE KEYS */;
INSERT INTO `registrationDetails` VALUES ('125','139','234','234','234','2342','MEDICARD','i dunno','','Dec_31_2011','','08:19:05','','','OPD','OPD','',''),('136','150','9989/98','3423','3453','23453','','GOOD at once','','Dec_31_2011','','14:36:59','','','OPD','OPD','',''),('141','155','90/30','38c','987','782','MEDICARD','fever','','Jan_04_2012','','11:21:48','','branch1','OPD','OPD_OPD','--',''),('142','156','90/30','38c','35ft','150lbs','','mild fever','','Jan_01_2012','','08:09:37','','','OPD','OPD','',''),('143','157','100/80','39c','150ft','150lbs','MEDICARD','mild fever','','Jan_02_2012','','12:06:50','','','OPD','OPD','',''),('153','167','10/80','130c','998','993','MEDICARD','mild fever','','Jan_17_2012','','06:45:29','','','OPD','OPD_OPD','--',''),('172','186','190/80','38c','159cm','100lbs','','mild fever','','Feb_25_2012','','17:51:15','','','OPD','OPD','',''),('174','188','100/100','38c','60ft','150lbs','MEDICARD','mild fever','','Jan_01_2012','','10:42:47','','','OPD','OPD','',''),('175','189','BLOOD PRESSURE','TEMPERATURE','HEIGHT','WEIGHT','','INITIAL DIAGNOSIS','','Feb_10_2012','','12:57:43','','','OPD','OPD','',''),('176','190','BLOOD PRESSURE','TEMPERATURE','HEIGHT','WEIGHT','','INITIAL DIAGNOSIS','','Jan_01_2012','','10:49:49','','','OPD','OPD','',''),('273','287','BLOOD PRESSURE','TEMPERATURE','HEIGHT','WEIGHT','','INITIAL DIAGNOSIS','','Jan_02_2012','','01:21:35','','','OPD','OPD','',''),('274','288','110/30','38c','159cm','150lbs','MEDICARD','mild fever','','Jan_02_2012','','02:10:26','','','OPD','OPD','',''),('142','289','90/30','39c','38ft','150lbs','','mild fever','','Jan_02_2012','','02:16:40','','','OPD','OPD','',''),('176','290','180/30','38c','35ft','3','','mild fever','','Jan_02_2012','','02:17:17','','','OPD','OPD','',''),('275','291','90/30','38c','38ft','150lbs','MEDICARD','mild fever','','Jan_02_2012','','02:18:00','','','OPD','OPD','',''),('141','292','90/30','38c','189ft','150lbs','MEDICARD','mild fever','','Jan_04_2012','','11:21:48','','','OPD','OPD','',''),('141','293','180/30','38c','189ft','150lbs','MEDICARD','mild fever','','Jan_04_2012','','11:21:48','','','OPD','OPD','',''),('143','294','10/80','139c','189ft','150lbs','MEDICARD','near in death','','Jan_02_2012','','12:06:50','','branch1','OPD','OPD_OPD','--',''),('141','320','80/100','140c','100cm','1000lbs','MEDICARD','kamukha ni ariel c glenn','','Jan_04_2012','','11:21:48','','','OPD','OPD','',''),('153','351','180/30','139c','189ft','150lbs','MEDICARD','Severe Damagez1','multi taskingz','Jan_17_2012','','06:45:29','','branch1','IPD','102_PRIVATE','--',''),('175','352','120/70','234','189ft','150lbs','','mildfever','','Feb_10_2012','','12:57:43','','branch2','OPD','OPD','',''),('296','353','180/30','139c','129','1000lbs','','i dunno','','Jan_18_2012','','02:13:35','','Alabang','OPD','OPD','',''),('175','365','BLOOD PRESSURE','TEMPERATURE','HEIGHT','WEIGHT','','INITIAL DIAGNOSIS','','Feb_10_2012','','12:57:43','','branch1','OPD','OPD_OPD','--',''),('303','371','180/30','130c','189ft','150lbs','MEDICARD','simple cought','','Feb_15_2012','','17:12:53','','branch2','OPD','OPD_OPD','',''),('303','373','10/80','139c','100cm','150lbs','MEDICARD','I DONT KNOW','','Feb_15_2012','','17:12:53','','branch2','OPD','OPD_OPD','00-000000000-0',''),('172','554','BLOOD PRESSURE','TEMPERATURE','HEIGHT','WEIGHT','','INITIAL DIAGNOSIS','','Feb_25_2012','','17:51:15','','branch2','OPD','OPD_OPD','00-000000000-0','Registrar'),('172','555','BLOOD PRESSURE','TEMPERATURE','HEIGHT','WEIGHT','','INITIAL DIAGNOSIS','','Feb_25_2012','','17:51:15','','branch2','OPD','OPD_OPD','--','Registrar'),('320','556','BLOOD PRESSURE','TEMPERATURE','HEIGHT','WEIGHT','','INITIAL DIAGNOSIS','','Mar_01_2012','','21:54:58','','branch2','OPD','OPD_OPD','00-000000000-0','Registrar'),('321','557','BLOOD PRESSURE','TEMPERATURE','HEIGHT','WEIGHT','','INITIAL DIAGNOSIS','','Feb_25_2012','','17:53:04','','branch2','OPD','OPD_OPD','--','Registrar'),('327','564','BLOOD PRESSURE','TEMPERATURE','HEIGHT','WEIGHT','','INITIAL DIAGNOSIS','','Mar_01_2012','','21:48:21','','branch2','IPD','ER','00-000000000-0','Registrar'),('329','566','BLOOD PRESSURE','TEMPERATURE','HEIGHT','WEIGHT','','INITIAL DIAGNOSIS','','Mar_01_2012','','21:48:44','','branch2','IPD','ER','00-000000000-0','Registrar'),('320','567','BLOOD PRESSURE','TEMPERATURE','HEIGHT','WEIGHT','','INITIAL DIAGNOSIS','','Mar_01_2012','','21:54:58','','branch2','OR/DR','OR/DR_OR/DR','00-000000000-0','Registrar'),('320','571','BLOOD PRESSURE','TEMPERATURE','HEIGHT','WEIGHT','','INITIAL DIAGNOSIS','','Mar_01_2012','','21:54:58','','branch1','OR/DR','OR/DR_OR/DR','--','Registrar'),('340','580','BLOOD PRESSURE','TEMPERATURE','HEIGHT','WEIGHT','','INITIAL DIAGNOSIS','','Mar_05_2012','','11:03:49','','branch2','OPD','OPD_OPD','00-000000000-0','register'),('341','581','BLOOD PRESSURE','TEMPERATURE','HEIGHT','WEIGHT','','INITIAL DIAGNOSIS','','Mar_05_2012','','11:04:10','','branch2','OPD','OPD_OPD','00-000000000-0','register'),('342','582','BLOOD PRESSURE','TEMPERATURE','HEIGHT','WEIGHT','','INITIAL DIAGNOSIS','','Mar_05_2012','','11:04:57','','branch2','OPD','OPD_OPD','00-000000000-0','register'),('343','583','BLOOD PRESSURE','TEMPERATURE','HEIGHT','WEIGHT','','INITIAL DIAGNOSIS','','Mar_05_2012','','11:05:55','','branch2','OPD','OPD_OPD','00-000000000-0','register'),('343','604','BLOOD PRESSURE','TEMPERATURE','HEIGHT','WEIGHT','','INITIAL DIAGNOSIS','','Mar_05_2012','','11:15:23','','branch2','OPD','OPD_OPD','00-000000000-0','register'),('343','605','BLOOD PRESSURE','TEMPERATURE','HEIGHT','WEIGHT','','INITIAL DIAGNOSIS','','Mar_05_2012','','11:21:09','','branch2','OPD','OPD_OPD','00-000000000-0','register'),('343','608','BLOOD PRESSURE','TEMPERATURE','HEIGHT','WEIGHT','','INITIAL DIAGNOSIS','','Mar_05_2012','','11:22:29','','branch2','OPD','OPD_OPD','00-000000000-0','register'),('320','610','BLOOD PRESSURE','TEMPERATURE','HEIGHT','WEIGHT','','INITIAL DIAGNOSIS','','Mar_07_2012','','13:21:42','','branch2','OPD','OPD_OPD','00-000000000-0','register'),('349','611','BLOOD PRESSURE','TEMPERATURE','HEIGHT','WEIGHT','','INITIAL DIAGNOSIS','','Mar_07_2012','','13:21:54','','branch2','OPD','OPD_OPD','00-000000000-0','register'),('341','614','110/30','100','HEIGHT','WEIGHT','','severez','','Mar_11_2012','','15:38:21','','branch2','OPD','OPD_OPD','00-000000000-0','register'),('361','650','120/90','37','155','125','','DENGUE','','Apr_28_2012','','15:40:15','','branch1','OPD','OPD_OPD','00-000000000-0','branch'),('364','629','130/90','167','160','140','','dengue','','May_26_2012','','09:36:16','','Alabang','OPD','OPD_OPD','00-000000000-0','register3'),('368','634','140/100','37C','140','168','','hypertension','','May_29_2012','','09:31:32','','branch1','OPD','OPD_OPD','--','register'),('369','635','160','120','130','179','','hypertension secondary to va','','May_29_2012','','09:40:27','','branch1','IPD','313_SOLOWARD','00-000000000-0','register'),('408','675','normal','60','174','78','MEDICARE','INITIAL DIAGNOSIS','','Nov_12_2012','','20:43:19','','branch2','OPD','OPD_OPD','00-000000000-0','register'),('413','680','190','38','190','50','','test diagnosis','','Nov_16_2012','','03:33:32','','Alabang','OPD','OPD_OPD','00-000000000-0','register3'),('429','696','BLOOD PRESSURE','TEMPERATURE','HEIGHT','WEIGHT','','INITIAL DIAGNOSIS','','Apr_08_2013','','07:35:02','','branch2','IPD','103_WARD','00-000000000-0','register');
/*!40000 ALTER TABLE `registrationDetails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reportHeading`
--

DROP TABLE IF EXISTS `reportHeading`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reportHeading` (
  `headingNo` int(11) NOT NULL AUTO_INCREMENT,
  `reportName` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `information` varchar(100) NOT NULL,
  PRIMARY KEY (`headingNo`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reportHeading`
--

LOCK TABLES `reportHeading` WRITE;
/*!40000 ALTER TABLE `reportHeading` DISABLE KEYS */;
INSERT INTO `reportHeading` VALUES (1,'hmoSOA_address','Address','129 sct.Dr Lazcano St,kamuning Q.c'),(2,'hmoSOA_name','clinic name','Synapse Medical Clinic'),(3,'PAN','Hospital_PAN_no','123456789'),(4,'Facility','Category of Facility','T-L4/L3'),(5,'exceededLimit','every SECONDS should update the patient profile if the patient is exceeded','3000'),(6,'anotherPrice','where to get the price rate of er and or/dr','OPD'),(7,'homeRoot','home root','/home/a1474846/public_html');
/*!40000 ALTER TABLE `reportHeading` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `room`
--

DROP TABLE IF EXISTS `room`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `room` (
  `roomNo` int(11) NOT NULL AUTO_INCREMENT,
  `Description` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `rate` varchar(100) NOT NULL,
  `branch` varchar(100) NOT NULL,
  `floor` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`roomNo`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `room`
--

LOCK TABLES `room` WRITE;
/*!40000 ALTER TABLE `room` DISABLE KEYS */;
INSERT INTO `room` VALUES (1,'313_SOLOWARD','SOLOWARD','350','branch1','medical ward','Occupied'),(3,'101_PRIVATE','PRIVATE','400','branch1','ward floor','Occupied'),(4,'102_PRIVATE','PRIVATE','200','branch1','medical ward','Occupied'),(5,'103_WARD','WARD','120','branch1','ward floor','Occupied'),(6,'303_PRIVATE','PRIVATE','900','Alabang','ICU','Vacant'),(7,'304_WARD','WARD','500','Alabang','Nursery','Vacant');
/*!40000 ALTER TABLE `room` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `session`
--

DROP TABLE IF EXISTS `session`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `session` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `session`
--

LOCK TABLES `session` WRITE;
/*!40000 ALTER TABLE `session` DISABLE KEYS */;
INSERT INTO `session` VALUES ('ricky','123');
/*!40000 ALTER TABLE `session` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-04-08 23:52:26
