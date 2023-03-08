/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package entities;

/**
 *
 * @author Ghass
 */
public class Question {
    
    private int id;
    private String question;
    private String reponse;
    private int note;
    private Test idtest;
    private String choix1;
    private String choix2;
    private String choix3;
    private String type;

    public Question() {
    }

    public Question(int id, String question, String reponse, int note, Test idtest) {
        this.id = id;
        this.question = question;
        this.reponse = reponse;
        this.note = note;
        this.idtest = idtest;
    }

    public Question(String question, String reponse, int note, Test idtest) {
        this.question = question;
        this.reponse = reponse;
        this.note = note;
        this.idtest = idtest;
    }

    public int getId() {
        return id;
    }

    public String getQuestion() {
        return question;
    }

    public String getReponse() {
        return reponse;
    }

    public int getNote() {
        return note;
    }

    public Test getIdtest() {
        return idtest;
    }

    public void setId(int id) {
        this.id = id;
    }

    public void setQuestion(String question) {
        this.question = question;
    }

    public void setReponse(String reponse) {
        this.reponse = reponse;
    }

    public void setNote(int note) {
        this.note = note;
    }

    public void setIdtest(Test idtest) {
        this.idtest = idtest;
    }

    public String getChoix1() {
        return choix1;
    }

    public void setChoix1(String choix1) {
        this.choix1 = choix1;
    }

    public String getChoix2() {
        return choix2;
    }

    public void setChoix2(String choix2) {
        this.choix2 = choix2;
    }

    public String getChoix3() {
        return choix3;
    }

    public void setChoix3(String choix3) {
        this.choix3 = choix3;
    }

    public String getType() {
        return type;
    }

    public void setType(String type) {
        this.type = type;
    }
    
    

    @Override
    public int hashCode() {
        int hash = 5;
        hash = 89 * hash + this.id;
        return hash;
    }

    @Override
    public boolean equals(Object obj) {
        if (this == obj) {
            return true;
        }
        if (obj == null) {
            return false;
        }
        if (getClass() != obj.getClass()) {
            return false;
        }
        final Question other = (Question) obj;
        if (this.id != other.id) {
            return false;
        }
        return true;
    }

    @Override
    public String toString() {
        return "Question{" + "id=" + id + ", question=" + question + ", reponse=" + reponse + ", note=" + note + ", idtest=" + idtest + '}';
    }
    
    
    
}
