const sql = require('./db.js');

const People = function(people) {
    this.Surname = people.Surname;
    this.Lastname = people.Lastname;
    this.City = people.City;
    this.Region = people.Region;
    this.JobTitle = people.JobTitle;
    this.mail = people.mail;
    this.WorkExperience = people.WorkExperience;
    this.Education = people.Education;
    this.password = people.password;
    this.admin = people.admin;
};

People.create = (newPeople, result) => {
    sql.query("INSERT INTO People SET ?", newPeople, (err, res) => {
        if (err) {
            console.log("error:", err);
            result(err, null);
            return;
        }
        console.log("created customer:", {id: res.insertId, ...newPeople});
        result(null, {id: res.insertId, ...newPeople});
    });
};

People.findById = (peopleId, result) => {
    sql.query("SELECT * FROM People WHERE id=" + peopleId, (err, res) => {
        if (err) {
            console.log("error:", err);
            result(err, null);
            return;
        }
        if (res.length) {
            console.log("found People", res[0]);
            result(null, res[0]);
            return;
        }
        result({kind: "not_found"}, null);
    });
};

People.getAll = result => {
    sql.query("SELECT * FROM People", (err, res) => {
        if (err) {
            console.log("error:", err);
            result(err, null);
            return;
        }
        console.log("People:", res);
        result(null, res);
    });
};

People.updateById = (id, people, result) => {
    sql.query("UPDATE People SET Surname=?, Lastname=?, City=?, Region=?, JobTitle=?, mail=?, WorkExperience=?, Education=?, password=?, admin=? WHERE id=" + id,
    [people.Surname, people.Lastname, people.City, people.Region, people.JobTitle, people.mail, people.WorkExperience, people.Education, people.password, people.admin], (err, res) => {
        if (err) {
            console.log("error:", err);
            result(null, err);
            return;
        }
        if (!res.affectedRows) {
            result({kind: 'not_found'}, null);
            return;
        }
        console.log("updated people: ", {id: id, ...people});
        result(null, {id: id, ...people});
    });
};

People.rmUser = (id, result) => {
    sql.query('DELETE FROM People WHERE id=' + id, (err, res) => {
        if (err) {
            console.log("error", err);
            result(null, err);
            return;
        }
        if (!res.affectedRows) {
            result({kind: 'not_found'}, null);
            return;
        }
        console.log('Deleted user with id: ', id);
        result(null, res);
    });
};

module.exports = People;