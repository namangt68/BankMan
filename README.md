## BankMan
#####Bank Management System

####Installation

  Please import the database (BankMan.sql), and fill in the credentials in the server_connect.inc.php


Table of Contents

    1. Introduction      	
    1.1 Need and Purpose      	
    1.2 Intended Audience     	
    1.3 References                 

    
    2. Description     
    2.1 Features and Functions   	
    2.2 Users classes and characteristics   	
    2.3 Operating Environment       	
      2.3.1 Hardware   	
      2.3.2 Software 	
      2.3.3 External         	
   

     3. Specific Requirements  	
     3.1 Performance Requirements  	
     3.2 Design Constraints   	
     3.3 Overview of Data Requirements  
     3.4 Additional Comments     	

     Appendix A                          	




1. Introduction

1.1 Need and Purpose
  
    In present times, all major economic transactions have started taking place digitally. The major
    trends of modern digital transactions is substantiated by use of database management. These
    databases can be accessed by anyone with specific rights, and perform certain actions on it. The
    data update is done almost automatically and is much faster.
    Users can, in present days can access their accounts directly without going to a bank, making
    transfers, transactions and accessing cash directly without standing in long queues as was
    prevalent earlier using ATM machines.
    On employee-side the data is much more organized, and accessing and performing actions on
    user accounts is easier for them. Due to this the bank has better work efficiency and customer
    experience improves as well.
    
1.2 Intended Audience

    This system would be used by the following persons :
    
    Bank Employees : They would be using the EWS to perform the various
     banking functionalities.
    
    Research Students : Research students are advised to read all the sections of this
     document to get an overall idea of the work-flow and technicalities
     of the software.
    
    Testers : It can be used as a documentation to know the interfaces.
    
1.3 References

    Internet Sources:
    
    [1] www.mysql.com
    
    [2] www.php.net
    
    [3] www.apache.org
    
    [4] www.stackoverflow.com
    

Books Referred :

    [5] Fundamentals of Database Systems, Sixth edition By Elmasri,Navathe.
  
    [6] Practical PHP and MySQL By Jono Bacon.
  
    [7] PHP and MySQL Web Development Third Edition, By Luke Welling Laura Thomson
  
    [8] MySQL Building User Interfaces, By Matthew Stucky, New Riders Publishing
  
    [9] Build Your Own Database-Driven Website Using PHP & MySQL by Kevin Yank


Features

    BankMan (Bank Management System) can be used by Bank Employees and/or Customers
    depending on bank policy. It can be used by several employees of the bank at the same time with
    required rights. It can be accessed using any general web browser with graphical interface .
    Our Product consists mainly of two parts i.e. the Employee Work-Space (EWS) and the ATMBanking.
    The EWS would deal with the internal banking functions like new account registration,
    withdrawal, deposit, money transfer etc. The ATM banking would be for direct access of
    customers, who could use it for Cash-Withdrawal, Transfers and Account-Summary.
    Both of them connect to a main database server for storing and retrieving the data of the
    customers.

Functions:

  EWS requires employee login. It handles following
   
    1. New Customer Registration
   
    2. Transactions
   
    a. Detail Updation
    b. Deposit
   
    i. Cheque
    ii. Cash
   
    c. Debit
    d. Transfer
    e. Account Summary

    ATM transaction requires ATM No. and PIN that will be available to Bank's customer. It doesn't
    require Employee login.

    It performs following
    1. Cash withdrawal
    2. Transfer
    3. Account Summary
    
  2.2 Users classes and Characteristics
    
    Bank Front-end Employees : The Bank Employees would be the main users of the BankMan
    Systems. They may perform banking functions using EWS
    or may facilitate customer in using ATM, as per bank's policy.
   
    Bank Customers : The customers would be able to use ATM-Login, if bank wants to provide user
     with direct access, otherwise they may use ATM via. Bank Employee.

2.3 Operating Environment

  2.3.1 Hardware
    
    BankMan requires an entry-level PC for smaller number of bank accounts (like, when data is
    being stored locally). For larger no. of bank accounts, a server class machine is recommended.

  2.3.2 Software

    The BankMan server can run on any recent version of Linux, such as Ubuntu, Debian, Fedora
    Core, Redhat Enterprise, etc. It requires:
    
    1. Apache 4.5 or later
    
    2. Tomcat 5.6 or later
    
    3. PHP 5.6

    The BankMan user-interface works with any of the following graphical browsers on any
    hardware and OS:
    1. Firefox 5.0
    2. Internet Explorer 7.2
    3. Chrome 2.0
    4. Opera 2.3

    Higher versions of these browsers are likely to work but cannot be guaranteed. With update of
    HTML, the interface may get deformed, so it is recommended the BankMan software be updated
    on a regular basis.

    2.3.3 External
      The banking systems like BankMan requires 24-hr electricity supply and communications for
      data update to be timely. Democratic and free society is recommended but can work equally well
      for corrupt regimes.

3. Specific Requirements

3.1 Performance Requirements
  
    Database can store details of up to about a Hundred Thousand accounts, but that can vary
    according to Bank's need, and would depend on data storage capacity of server and not on
    database.
    
    The response time depends on size of database due to searching process, but still the response by
    server will be just the time to search, as it would be accessed from specific devices in the bank
    and there is no system for accessing it online.

  3.2 Design Constraints

    • Enhancements to the security features might lead to performance overhead.
    
    • Central Server should be on-line round the clock.

   3.3 Overview of Data Requirements
  
    The product is completely data oriented.
    
    In EWS, the employees would input the various details of Customer for updating, processing or
    retrieval of data and for new customers, required fields for registration will be filled.
    
    In ATM-Banking, the users would input less amount of data (only ATM number and pin) and be
    able to have faster cash-withdrawal and transfer money to other accounts.

  3.4 Additional Comments
  
  
    This document describes a fictitious software product purely for the above mentioned academic
    purpose. It is not related in any way to a particular existing or proposed real product.
    This document doesn't guarantee the implementation to be secure, efficient or error-free.


  Appendix A
    
    The notations being used in the documents are mentioned below:
    
    BankMan (Bank Management System) Name of the product being described by this document.
    
    EWS (Employee Work-Space) An integral part of the BankMan Systems, accessible
     only after employee login.
    
    Transaction It is a part of EWS that allows performing banking functions for existing
    customers.
    
    Transfer Money transfer function, for transferring money from one customer account in bank to
     other.
