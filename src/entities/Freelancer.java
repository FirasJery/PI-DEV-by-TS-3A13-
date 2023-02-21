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
public class Freelancer  extends Utilisateur{
        private String bio ; 
        private String experience ; 
        private String education ; 
        private int total_jobs ; 

    public Freelancer() {
    }

    public Freelancer(String bio, String experience, String education, int total_jobs, int id, String name, String email, String password, String role, String ImagePath) {
        super(id, name, email, password, role, ImagePath);
        this.bio = bio;
        this.experience = experience;
        this.education = education;
        this.total_jobs = total_jobs;
    }

    public Freelancer(String bio, String experience, String education, int total_jobs, String name, String email, String password, String role, String ImagePath) {
        super(name, email, password, role, ImagePath);
        this.bio = bio;
        this.experience = experience;
        this.education = education;
        this.total_jobs = total_jobs;
    }

   
    public String getBio() {
        return bio;
    }

    public void setBio(String bio) {
        this.bio = bio;
    }

    public String getExperience() {
        return experience;
    }

    public void setExperience(String experience) {
        this.experience = experience;
    }

    public String getEducation() {
        return education;
    }

    public void setEducation(String education) {
        this.education = education;
    }

    public int getTotal_jobs() {
        return total_jobs;
    }

    public void setTotal_jobs(int total_jobs) {
        this.total_jobs = total_jobs;
    }

    @Override
    public String toString() {
        return "Freelancer{" + "bio=" + bio + ", experience=" + experience + ", education=" + education + ", total_jobs=" + total_jobs + '}';
    }

    
    
    
}
