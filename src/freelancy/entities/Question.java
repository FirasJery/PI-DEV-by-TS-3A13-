/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package freelancy.entities;

/**
 *
 * @author hichem
 */
public class Question {
    private long idQuest;
    private String question;
    private String reponse;
    private int note;
    private long idTest;

    public Question() {
    }

    public Question(String question, String reponse, int note) {
        this.question = question;
        this.reponse = reponse;
        this.note = note;
    }
    
    

    public Question(String question, String reponse, int note, long idTest) {
        this.question = question;
        this.reponse = reponse;
        this.note = note;
        this.idTest = idTest;
    }
    
    

    public Question(long idQuest, String question, String reponse, int note, long idTest) {
        this.idQuest = idQuest;
        this.question = question;
        this.reponse = reponse;
        this.note = note;
        this.idTest = idTest;
    }

    public long getIdQuest() {
        return idQuest;
    }

    public void setIdQuest(long idQuest) {
        this.idQuest = idQuest;
    }

    public String getQuestion() {
        return question;
    }

    public void setQuestion(String question) {
        this.question = question;
    }

    public String getReponse() {
        return reponse;
    }

    public void setReponse(String reponse) {
        this.reponse = reponse;
    }

    public int getNote() {
        return note;
    }

    public void setNote(int note) {
        this.note = note;
    }

    public long getIdTest() {
        return idTest;
    }

    public void setIdTest(long idTest) {
        this.idTest = idTest;
    }

    @Override
    public String toString() {
        return "Question{" + "question=" + question + '}';
    }
    
    

    @Override
    public int hashCode() {
        int hash = 7;
        hash = 79 * hash + (int) (this.idQuest ^ (this.idQuest >>> 32));
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
        if (this.idQuest != other.idQuest) {
            return false;
        }
        return true;
    }

    
    
    
}
