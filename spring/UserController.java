package com.example.demo.controller;

import com.example.demo.model.User;
import com.example.demo.repository.UserRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RestController;

import java.util.List;

@RestController
public class UserController {

    // Inject UserRepository to interact with the database
    @Autowired
    private UserRepository userRepository;

    // Endpoint to fetch all users from the database
    @GetMapping("/users")
    public List<User> getUsers() {
        return userRepository.findAll(); // Fetch all users from the DB
    }

    // Endpoint to add a new user to the database
    @PostMapping("/users")
    public User addUser(@RequestBody User user) {
        return userRepository.save(user); // Save a new user to the DB
    }
}
