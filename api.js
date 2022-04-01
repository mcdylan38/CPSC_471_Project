// cd "Documents\Dylan\School\Y3 - 2021 FALL\CPSC 471 - Database Management Systems\Project"
// node api.js

const port=3000;

const express=require("express");
const app=express();

app.listen(port);
console.log("Server running on port " + port + "\n");

const mySQL=require("mysql");
const mySQLCon=mySQL.createConnection({
	host: "localhost",
	user: "root",				// Change login credentials 
	password: "draGGun.!382",	// to be your own
	database: "471_test",
	multipleStatements: true
});

mySQLCon.connect((err) => {
	if(!err){
		console.log("Connected to database!");
	}
	else{
		console.log("Connection failed. Error: " + JSON.stringify(err, undefined, 2));
	}
});

const bodyParser=require("body-parser");
app.use(bodyParser.urlencoded({extended: true}));
app.use(bodyParser.json());

// API Endpoints
app.get("/api/nurse", (req, res) => {
	// Get all nurses
	mySQLCon.query("SELECT * FROM Nurses", (err, rows, fields) => {
		if(!err){
			res.send(rows);
		}
		else{
			console.log(err);
		}
	})
});

app.get("/api/nurse/:ID", (req, res) => {
	// Get specific nurse
	mySQLCon.query("SELECT * FROM Nurses WHERE ID=?", [req.params.ID], (err, rows, fields) => {
		if(!err){
			res.send(rows);
		}
		else{
			console.log(err);
		}
	});
});

app.post("/api/nurse", (req, res) => {
	// Add new nurse (edit query to include ALL attributes)
	mySQLCon.query("INSERT INTO Nurses(Name, Age, Phone_Number, Address, Email) VALUES(?, ?, ?, ?, ?)", 
	[req.body.Name, req.body.Age, req.body.Phone_Number, req.body.Address, req.body.Email], (err, rows, fields) => {
		if(!err){
			res.send("Record successfully added");
		}
		else{
			console.log(err);
		}
	});
});

app.delete("/api/nurse/:ID", (req, res) => {
	// Delete specific nurse
	mySQLCon.query("DELETE FROM Nurses WHERE ID=?", [req.params.ID], (err, rows, fields) => {
		if(!err){
			res.send("Record successfully deleted");
		}
		else{
			console.log(err);
		}
	});
});


app.get("/api/doctor", (req, res) => {
	// Get all doctors
	mySQLCon.query("SELECT * FROM Doctors", (err, rows, fields) => {
		if(!err){
			res.send(rows);
		}
		else{
			console.log(err);
		}
	})
});

app.get("/api/doctor/:ID", (req, res) => {
	// Get Specific doctor
	mySQLCon.query("SELECT * FROM Doctors WHERE ID=?", [req.params.ID], (err, rows, fields) =>{
		if(!err){
			res.send(rows);
		}
		else {
			console.log(err);
		}
	});
});

app.post("/api/doctor", (req, res) => {
	mySQLCon.query("INSERT INTO Doctors(Name, Age, Phone_Number, Address, Specialization) VALUES(?, ?, ?, ?, ?)",
		[req.body.Name, req.body.Age, req.body.Phone_Number, req.body.Address, req.body.Specialization],
	(err, rows, fields) => {
		if(!err) {
			res.send("Record Successfully Added");
		}
		else {
			console.log(err);
		}
	});
});

app.delete("/api/doctor/:ID", (req, res) => {
	// Delete specific doctor
	mySQLCon.query("DELETE FROM Doctors WHERE ID=?", [req.params.ID], (err, rows, fields) =>{
		if(!err) {
			res.send("Record Successfully Deleted");
		}
		else {
			console.log(err);
		}
	});
});


app.get("/api/company", (req, res) => {
	// Get all companies
	mySQLCon.query("SELECT * FROM Companies", (err, rows, fields) => {
		if(!err){
			res.send(rows);
		}
		else{
			console.log(err);
		}
	})
});

app.get("/api/company/:Name", (req, res) => {
	// Get specific company
	mySQLCon.query("SELECT * FROM Companies WHERE Name=?", [req.params.Name], (err, rows, fields) => {
		if(!err) {
			res.send(rows);
		}
		else {
			console.log(err);
		}
	});
});

app.post("/api/company", (req, res) =>{
	// Add new company
	mySQLCon.query("INSERT INTO Companies(Name, Location) VALUES(?, ?)", 
	[req.body.Name, req.body.Location], (err, rows, fields) => {
		if(!err) {
			res.send("Record Successfully Added");
		}
		else {
			console.log(err);
		}
	});
});

app.delete("/api/company/:Name", (req, res) =>{
	// Delete Specific Company
	mySQLCon.query("DELETE FROM Companies WHERE Name=?", [req.params.Name], (err, rows, fields) => {
		if(!err) {
			res.send("Record Successfully Deleted");
		}
		else {
			console.log(err);
		}
	});
});


app.get("/api/review", (req, res) => {
	// Get all reviews
	mySQLCon.query("SELECT * FROM Reviews", (err, rows, fields) => {
		if(!err){
			res.send(rows);
		}
		else{
			console.log(err);
		}
	})
});

app.get("/api/review/:ID", (req, res) => {
	// Get specific Review
	mySQLCon.query("SELECT * FROM Reviews WHERE R_ID=?", [req.params.ID], (err, rows, fields) => {
		if(!err) {
			res.send(rows);
		}
		else {
			console.log(err);
		}
	});
});

app.post("/api/review", (req, res) => {
	// Post a new Review
	mySQLCon.query("INSERT INTO Reviews(N_ID, P_ID, Comments, Rating) VALUES(?, ?, ?, ?)",
	[req.body.N_ID, req.body.P_ID, req.body.Comments, req.body.Rating], (err, rows, fields) => {
		if(!err) {
			res.send("Record Successfully Added");
		}
		else {
			console.log(err);
		}
	});
});

app.delete("/api/review/:ID", (req, res) => {
	// Delete Specific Review
	mySQLCon.query("DELETE FROM Reviews WHERE R_ID=?", [req.params.ID], (err, rows, fields) => {
		if(!err) {
			res.send("Record Successfully Deleted");
		}
		else {
			console.log(err);
		}
	});
});


app.get("/api/medicalhistory", (req, res) => {
	// Get all medical histories
	mySQLCon.query("SELECT * FROM MedicalHistories", (err, rows, fields) => {
		if(!err){
			res.send(rows);
		}
		else{
			console.log(err);
		}
	})
});

app.get("/api/medicalhistory/:ID", (req, res) => {
	// Get medical history from patient
	mySQLCon.query("SELECT * FROM MedicalHistories WHERE MH_ID=?", [req.params.ID], (err, rows, fields) => {
		if(!err) {
			res.send(rows);
		}
		else {
			console.log(err);
		}
	});
});

app.post("/api/medicalhistory", (req, res) => {
	// Add new medical history entry
	mySQLCon.query("INSERT INTO MedicalHistories(P_ID, Illness, Symptoms, InfectionDate) VALUES (?, ?, ?, ?)",
	[req.body.P_ID, req.body.Illness, req.body.Symptoms, req.body.InfectionDate], (err, rows, fields) => {
		if(!err) {
			res.send("Record Successfully Added");
		}
		else {
			console.log(err);
		}
	});
});

app.delete("/api/medicalhistory/:ID", (req, res) => {
	// Delete specific medical history entry
	mySQLCon.query("DELETE FROM MedicalHistories WHERE MH_ID=?", [req.params.ID], (err, rows, fields) => {
		if(!err) {
			res.send("Record Successfully Deleted");
		}
		else {
			console.log(err);
		}
	});
});


app.get("/api/workschedule", (req, res) => {
	// Get all work schedules
	mySQLCon.query("SELECT * FROM WorkSchedules", (err, rows, fields) => {
		if(!err){
			res.send(rows);
		}
		else{
			console.log(err);
		}
	})
});

app.get("/api/workschedule/:ID", (req, res) => {
	// Get Work Schedule based on Nurse_ID
	mySQLCon.query("SELECT * FROM WorkSchedules WHERE WS_ID=?", [req.params.ID], (err, rows, fields) => {
		if (!err) {
			res.send(rows);
		}
		else {
			console.log(err);
		}
	});
});

app.post("/api/workschedule", (req, res) => {
	// Add new work schedule
	mySQLCon.query("INSERT INTO WorkSchedules(N_ID, P_ID, Date, StartTime, EndTime) VALUES(?, ?, ?, ?, ?)", 
	[req.body.N_ID, req.body.P_ID, req.body.Date, req.body.StartTime, req.body.EndTime],
	(err, rows, fields) => {
		if(!err) {
			res.send("Record Successfully Added");
		}
		else {
			console.log(err);
		}
	});
});

app.delete("/api/workschedule/:ID", (req, res) => {
	// Delete specific work date and time
	mySQLCon.query("DELETE FROM WorkSchedules WHERE WS_ID=?", [req.params.ID], (err, rows, fields) => {
		if(!err) {
			res.send("Record Successfully Deleted");
		}
		else {
			console.log(err);
		}
	});
});


app.get("/api/visitschedule", (req, res) => {
	// Get all visit schedules
	mySQLCon.query("SELECT * FROM VisitSchedules", (err, rows, fields) => {
		if(!err){
			res.send(rows);
		}
		else{
			console.log(err);
		}
	})
});

app.get("/api/visitschedule/:ID", (req, res) =>{
	// Get patient's visit schedule
	mySQLCon.query("SELECT * FROM VisitSchedules WHERE VS_ID=?", [req.params.ID], (err, rows, fields) => {
		if(!err) {
			res.send(rows);
		}
		else {
			console.log(err);
		}
	});
});

app.post("/api/visitschedule", (req, res) => {
	// Add new visit schedule
	mySQLCon.query("INSERT INTO VisitSchedules(P_ID, VisitorNames, Date, StartTime, EndTime) VALUES(?, ?, ?, ?, ?)",
		[req.body.P_ID, req.body.VisitorNames, req.body.Date, req.body.StartTime, req.body.EndTime], (err, rows, fields) => {
		if(!err) {
			res.send("Record Successfully Added");
		}
		else {
			console.log(err);
		}
	});
});

app.delete("/api/visitschedule/:ID", (req, res) => {
	// Delete specific visit schedule
	mySQLCon.query("DELETE FROM VisitSchedules WHERE VS_ID=?", [req.params.ID], (err, rows, fields) => {
		if(!err) {
			res.send("Record Successfully Deleted");
		}
		else {
			console.log(err);
		}
	});
});

app.get("/api/equipment", (req, res) => {
	// Get all equipment
	mySQLCon.query("SELECT * FROM Equipment", (err, rows, fields) => {
		if(!err){
			res.send(rows);
		}
		else{
			console.log(err);
		}
	})
});

app.get("/api/equipment/:ID", (req, res) => {
	// Get specific equipment
	mySQLCon.query("SELECT * FROM Equipment WHERE ID=?", [req.params.ID], (err, rows, fields) => {
		if(!err){
			res.send(rows);
		}
		else{
			console.log(err);
		}
	})
});

app.post("/api/equipment", (req, res) => {
	// Add new equipment (edit query to include ALL attributes)
	mySQLCon.query("INSERT INTO Equipment(Name, Company) VALUES(?, ?)", [req.body.Name, req.body.Company], (err, rows, fields) => {
		if(!err){
			res.send("Record successfully added");
		}
		else{
			console.log(err);
		}
	});
});

app.delete("/api/equipment/:ID", (req, res) => {
	// Delete specific equipment
	mySQLCon.query("DELETE FROM Equipment WHERE ID=?", [req.params.ID], (err, rows, fields) => {
		if(!err){
			res.send("Record successfully deleted");
		}
		else{
			console.log(err);
		}
	})
});

app.get("/api/patient", (req, res) => {
	// Get all patients
	mySQLCon.query("SELECT * FROM Patients", (err, rows, fields) => {
		if(!err){
			res.send(rows);
		}
		else{
			console.log(err);
		}
	})
});

app.get("/api/patient/:ID", (req, res) => {
	// Get specific patient
	mySQLCon.query("SELECT * FROM Patients WHERE ID=?", [req.params.ID], (err, rows, fields) => {
		if(!err){
			res.send(rows);
		}
		else{
			console.log(err);
		}
	})
});

app.post("/api/patient", (req, res) => {
	// Add new patient
	mySQLCon.query("INSERT INTO Patients(Name, Age, Phone_Number, Address) VALUES(?, ?, ?, ?)", 
		[req.body.Name, req.body.Age, req.body.Phone_Number, req.body.Address], (err, rows, fields) => {
		if(!err){
			res.send("Record successfully added");
		}
		else{
			console.log(err);
		}
	});
});

app.delete("/api/patient/:ID", (req, res) => {
	// Delete specific patient
	mySQLCon.query("DELETE FROM Patients WHERE ID=?", [req.params.ID], (err, rows, fields) => {
		if(!err){
			res.send("Record successfully deleted");
		}
		else{
			console.log(err);
		}
	})
});

app.get("/api/questionnaire", (req, res) => {
	// Get all questionnaires
	mySQLCon.query("SELECT * FROM Questionnaires", (err, rows, fields) => {
		if(!err){
			res.send(rows);
		}
		else{
			console.log(err);
		}
	})
});

app.get("/api/questionnaire/:ID", (req, res) => {
	// Get questionnaire results for specific patient
	mySQLCon.query("SELECT * FROM Questionnaires WHERE P_ID=?", [req.params.ID], (err, rows, fields) => {
		if(!err){
			res.send(rows);
		}
		else{
			console.log(err);
		}
	})
});

app.post("/api/questionnaire", (req, res) => {
	// Add new questionnaire
	mySQLCon.query("INSERT INTO Questionnaires(P_ID, Q_ID, Results) VALUES(?, ?, ?)", [req.body.P_ID, req.body.Q_ID, req.body.Results], 
		(err, rows, fields) => {
		if(!err){
			res.send("Record successfully added");
		}
		else{
			console.log(err);
		}
	});
});

app.delete("/api/questionnaire/:ID", (req, res) => {
	// Delete questionnaire results of specific patient
	mySQLCon.query("DELETE FROM Questionnaires WHERE P_ID=?", [req.params.ID], (err, rows, fields) => {
		if(!err){
			res.send("Record(s) successfully deleted");
		}
		else{
			console.log(err);
		}
	})
});

app.get("/api/careplan", (req, res) => {
	// Get all care plans
	mySQLCon.query("SELECT * FROM CarePlans", (err, rows, fields) => {
		if(!err){
			res.send(rows);
		}
		else{
			console.log(err);
		}
	})
});

app.get("/api/careplan/:ID", (req, res) => {
	// Get specific care plan
	mySQLCon.query("SELECT * FROM CarePlans WHERE CP_ID=?", [req.params.ID], (err, rows, fields) => {
		if(!err){
			res.send(rows);
		}
		else{
			console.log(err);
		}
	})
});

app.post("/api/careplan", (req, res) => {
	// Add new care plan
	mySQLCon.query("INSERT INTO CarePlans(P_ID, Treatments, EconomicStanding) VALUES(?, ?, ?)", 
		[req.body.P_ID, req.body.Treatments, req.body.EconomicStanding], (err, rows, fields) => {
		if(!err){
			res.send("Record successfully added");
		}
		else{
			console.log(err);
		}
	});
});

app.delete("/api/careplan/:ID", (req, res) => {
	// Delete specific care plan
	mySQLCon.query("DELETE FROM CarePlans WHERE CP_ID=?", [req.params.ID], (err, rows, fields) => {
		if(!err){
			res.send("Record successfully deleted");
		}
		else{
			console.log(err);
		}
	})
});

