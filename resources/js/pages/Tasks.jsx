import React, { useState, useEffect } from 'react';
import { 
    Box, 
    Button, 
    Container, 
    Typography, 
    Card, 
    CardContent,
    CardActions,
    Grid,
    Dialog,
    DialogTitle,
    DialogContent,
    DialogActions,
    TextField,
    MenuItem
} from '@mui/material';
import { useForm } from 'react-hook-form';
import api from '../services/api';
import toast from 'react-hot-toast';

export default function Tasks() {
    const [tasks, setTasks] = useState([]);
    const [open, setOpen] = useState(false);
    const [editingTask, setEditingTask] = useState(null);
    const { register, handleSubmit, reset } = useForm();

    const fetchTasks = async () => {
        try {
            const response = await api.get('/tasks');
            setTasks(response.data);
        } catch (error) {
            toast.error('Error loading tasks');
        }
    };

    useEffect(() => {
        fetchTasks();
    }, []);

    const handleOpen = (task = null) => {
        setEditingTask(task);
        if (task) {
            reset(task);
        } else {
            reset({});
        }
        setOpen(true);
    };

    const handleClose = () => {
        setOpen(false);
        setEditingTask(null);
        reset({});
    };

    const onSubmit = async (data) => {
        try {
            if (editingTask) {
                await api.put(`/tasks/${editingTask.id}`, data);
                toast.success('Task updated successfully');
            } else {
                await api.post('/tasks', data);
                toast.success('Task created successfully');
            }
            handleClose();
            fetchTasks();
        } catch (error) {
            toast.error('Error saving task');
        }
    };

    const handleDelete = async (id) => {
        try {
            await api.delete(`/tasks/${id}`);
            toast.success('Task deleted successfully');
            fetchTasks();
        } catch (error) {
            toast.error('Error deleting task');
        }
    };

    return (
        <Container maxWidth="lg" sx={{ mt: 4 }}>
            <Box sx={{ display: 'flex', justifyContent: 'space-between', mb: 4 }}>
                <Typography variant="h4">Tasks</Typography>
                <Button variant="contained" onClick={() => handleOpen()}>
                    Add Task
                </Button>
            </Box>

            <Grid container spacing={3}>
                {tasks.map((task) => (
                    <Grid item xs={12} sm={6} md={4} key={task.id}>
                        <Card>
                            <CardContent>
                                <Typography variant="h6">{task.title}</Typography>
                                <Typography color="textSecondary">
                                    Status: {task.status}
                                </Typography>
                                <Typography variant="body2">
                                    {task.description}
                                </Typography>
                            </CardContent>
                            <CardActions>
                                <Button size="small" onClick={() => handleOpen(task)}>
                                    Edit
                                </Button>
                                <Button size="small" color="error" onClick={() => handleDelete(task.id)}>
                                    Delete
                                </Button>
                            </CardActions>
                        </Card>
                    </Grid>
                ))}
            </Grid>

            <Dialog open={open} onClose={handleClose}>
                <DialogTitle>
                    {editingTask ? 'Edit Task' : 'New Task'}
                </DialogTitle>
                <form onSubmit={handleSubmit(onSubmit)}>
                    <DialogContent>
                        <TextField
                            autoFocus
                            margin="dense"
                            label="Title"
                            fullWidth
                            {...register('title')}
                        />
                        <TextField
                            margin="dense"
                            label="Description"
                            fullWidth
                            multiline
                            rows={4}
                            {...register('description')}
                        />
                        <TextField
                            select
                            margin="dense"
                            label="Status"
                            fullWidth
                            {...register('status')}
                            defaultValue="pending"
                        >
                            <MenuItem value="pending">Pending</MenuItem>
                            <MenuItem value="in_progress">In Progress</MenuItem>
                            <MenuItem value="completed">Completed</MenuItem>
                        </TextField>
                    </DialogContent>
                    <DialogActions>
                        <Button onClick={handleClose}>Cancel</Button>
                        <Button type="submit">Save</Button>
                    </DialogActions>
                </form>
            </Dialog>
        </Container>
    );
} 