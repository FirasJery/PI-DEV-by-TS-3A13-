/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package entities;

/**
 *
 * @author Firas
 */
public class Admin extends Utilisateur{
    
    public Admin(int id, String name, String email, String password, String role) {
        super(id, name, email, password, role);
    }

    public Admin(String name, String email, String password, String role) {
        super(name, email, password, role);
    }

    public Admin() {
    }

    @Override
    public String toString() {
        return "Admin{name=" + name + ", email=" + email + ", password=" + password +  "} \n";
    }

}
